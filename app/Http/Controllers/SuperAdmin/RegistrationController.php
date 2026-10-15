<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function index(): View
    {
        $registrations = User::where('role', 'student')
            ->whereIn('status', [
                'pending',
                'accepted',
                'rejected',
                'confirmed'
            ])
            ->latest()
            ->get();

        return view(
            'superadmin.inscriptions.index',
            compact('registrations')
        );
    }
}
