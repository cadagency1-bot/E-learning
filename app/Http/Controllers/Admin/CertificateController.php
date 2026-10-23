<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Certificate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;

class CertificateController extends Controller
{
    /**
     * Afficher les demandes de certificats.
     */
    public function index(): View
    {
        $certificates = Certificate::with(['user', 'formation'])
            ->orderByRaw("CASE WHEN status = 'pending' THEN 0 ELSE 1 END")
            ->latest()
            ->paginate(15);

        $pendingCount = Certificate::where('status', 'pending')->count();

        return view('admin.certificates.index', compact(
            'certificates',
            'pendingCount'
        ));
    }

    /**
     * Upload du PDF par l'Admin.
     */
    public function upload(Request $request, Certificate $certificate): RedirectResponse
    {
        $request->validate([
            'certificate_file' => [
                'required',
                'file',
                'mimes:pdf',
                'max:10240',
            ],
        ], [
            'certificate_file.required' => 'Choisissez un fichier PDF.',
            'certificate_file.mimes' => 'Le fichier doit être au format PDF.',
            'certificate_file.max' => 'Le PDF ne doit pas dépasser 10 Mo.',
        ]);

        $path = $request->file('certificate_file')
            ->store('certificates', 'local');

        if ($certificate->file_path) {
            Storage::disk('local')->delete($certificate->file_path);
        }

        $certificate->update([
            'file_path' => $path,
            'status' => 'pending',
            'activated_at' => null,
        ]);

        return redirect()
            ->route('admin.certificates.index')
            ->with('success', 'Le PDF a été envoyé. Vous pouvez maintenant activer le certificat.');
    }

    /**
     * Activer seulement après upload du PDF.
     */
    public function activate(Certificate $certificate): RedirectResponse
    {
        if (!$certificate->file_path ||
            !Storage::disk('local')->exists($certificate->file_path)) {
            return back()->with(
                'error',
                'Veuillez d’abord envoyer le PDF du certificat.'
            );
        }

        if ($certificate->status === 'active') {
            return back()->with('info', 'Ce certificat est déjà activé.');
        }

        $certificate->update([
            'status' => 'active',
            'activated_at' => now(),
            'issued_at' => now(),
        ]);

        return redirect()
            ->route('admin.certificates.index')
            ->with(
                'success',
                'Le certificat de ' . $certificate->user->name
                . ' a été activé avec succès.'
            );
    }

    /**
     * Télécharger / consulter le PDF depuis l'administration.
     */
    public function download(Certificate $certificate): StreamedResponse
    {
        abort_unless(
            $certificate->file_path &&
            Storage::disk('local')->exists($certificate->file_path),
            404,
            'Le fichier PDF est introuvable.'
        );

        return Storage::disk('local')->download(
            $certificate->file_path,
            'Certificat-' . $certificate->id . '.pdf'
        );
    }


    
public function studentDownload(Certificate $certificate)
{
    abort_unless(
        auth()->check()
        && (int) $certificate->user_id === (int) auth()->id()
        && $certificate->status === 'active',
        403
    );

    abort_unless(
        $certificate->file_path
        && \Illuminate\Support\Facades\Storage::disk('local')
            ->exists($certificate->file_path),
        404
    );

    return \Illuminate\Support\Facades\Storage::disk('local')->download(
        $certificate->file_path,
        'Certificat-' . $certificate->id . '.pdf'
    );
}

}
