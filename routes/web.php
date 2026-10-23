
<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\LessonProgressController;

use App\Http\Controllers\Admin\RegistrationController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\FormationController;
use App\Http\Controllers\Admin\CoursController;
use App\Http\Controllers\Admin\FormationRequestController;
use App\Http\Controllers\Admin\CertificateController as AdminCertificateController;

use App\Http\Controllers\SuperAdmin\DashboardController as SuperAdminDashboardController;
use App\Http\Controllers\SuperAdmin\AdminController as SuperAdminAdminController;
use App\Http\Controllers\SuperAdmin\RegistrationController as SuperAdminRegistrationController;


/*
|--------------------------------------------------------------------------
| Page d'accueil
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


/*
|--------------------------------------------------------------------------
| Demande de certificat par l'étudiant
|--------------------------------------------------------------------------
*/

Route::post('/formations/{formation}/certificate', [
    CertificateController::class,
    'issue'
])->middleware('auth')->name('certificates.issue');


/*
|--------------------------------------------------------------------------
| Dashboard étudiant
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    $user = auth()->user();

    $allFormations = \App\Models\Formation::with([
        'cours',
        'quizzes.questions'
    ])->orderBy('name')->get();

    $activeFormationIds = $user->formations()
        ->wherePivot('status', 'active')
        ->pluck('formations.id')
        ->toArray();

    $formations = $allFormations
        ->whereIn('id', $activeFormationIds)
        ->values();

    $formationStatuses = $user->formations()
        ->get()
        ->keyBy('id');

    return view('dashboard', compact(
        'formations',
        'allFormations',
        'formationStatuses'
    ));

})->middleware('auth')->name('dashboard');


/*
|--------------------------------------------------------------------------
| Certificat de l'étudiant - téléchargement sécurisé
|--------------------------------------------------------------------------
*/

Route::get('/mes-certificats/{certificate}/download', [
    AdminCertificateController::class,
    'studentDownload',
])->middleware('auth')->name('student.certificates.download');


/*
|--------------------------------------------------------------------------
| Administration classique
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Tableau de bord
        Route::get('/dashboard', [
            DashboardController::class,
            'index'
        ])->name('dashboard');


        
    // Marquer la notification du certificat comme lue
    Route::post('/notifications/{notification}/read', function (
        \Illuminate\Notifications\DatabaseNotification $notification
    ) {
        abort_unless(
            $notification->notifiable_id === auth()->id()
            && $notification->notifiable_type === \App\Models\User::class,
            403
        );

        $notification->markAsRead();

        return redirect()->route('dashboard');
    })->name('student.notifications.read');


        /*
        | Inscriptions
        */

        Route::get('/registrations', [
            RegistrationController::class,
            'index'
        ])->name('registrations.index');

        Route::match(['post', 'patch'], '/registrations/{user}/accept', [
            RegistrationController::class,
            'accept'
        ])->name('registrations.accept');

        Route::match(['post', 'patch'], '/registrations/{user}/reject', [
            RegistrationController::class,
            'reject'
        ])->name('registrations.reject');

        Route::delete('/registrations/{user}', [
            RegistrationController::class,
            'destroy'
        ])->name('registrations.destroy');


        /*
        | Demandes de formations
        */

        Route::get('/formation-requests', [
            FormationRequestController::class,
            'index'
        ])->name('formation-requests.index');

        Route::patch('/formation-requests/{id}/activate', [
            FormationRequestController::class,
            'activate'
        ])->name('formation-requests.activate');

        Route::patch('/formation-requests/{id}/reject', [
            FormationRequestController::class,
            'reject'
        ])->name('formation-requests.reject');


        /*
        | Formations
        */

        Route::resource('formations', FormationController::class);


        /*
        | Cours
        */

        Route::resource('cours', CoursController::class);

        Route::delete('/cours/{cour}/media/{type}', [
            CoursController::class,
            'deleteMedia'
        ])->name('cours.media.destroy');


        /*
        | Quiz - Administration
        */

        Route::get('/quiz', [
            QuizController::class,
            'index'
        ])->name('quiz.index');

        Route::get('/quiz/create', [
            QuizController::class,
            'create'
        ])->name('quiz.create');

        Route::post('/quiz', [
            QuizController::class,
            'store'
        ])->name('quiz.store');

        Route::get('/quiz/{quiz}/question', [
            QuizController::class,
            'createQuestion'
        ])->name('quiz.question.create');

        Route::post('/quiz/{quiz}/question', [
            QuizController::class,
            'storeQuestion'
        ])->name('quiz.question.store');


        /*
        | Certificats - Administration
        */

        Route::get('/certificates', [
            AdminCertificateController::class,
            'index'
        ])->name('certificates.index');

        // Importer le PDF depuis l'ordinateur
        Route::post('/certificates/{certificate}/upload', [
            AdminCertificateController::class,
            'upload'
        ])->name('certificates.upload');

        // Voir ou télécharger le PDF
        Route::get('/certificates/{certificate}/download', [
            AdminCertificateController::class,
            'download'
        ])->name('certificates.download');

        // Activer le certificat après l'import du PDF
        Route::patch('/certificates/{certificate}/activate', [
            AdminCertificateController::class,
            'activate'
        ])->name('certificates.activate');

    });


/*
|--------------------------------------------------------------------------
| Super Administration
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'superadmin'])
    ->prefix('superadmin')
    ->name('superadmin.')
    ->group(function () {

        // Tableau de bord
        Route::get('/dashboard', [
            SuperAdminDashboardController::class,
            'index'
        ])->name('dashboard');


        // Gestion des administrateurs
        Route::resource(
            'administrateurs',
            SuperAdminAdminController::class
        )->except(['show']);


        // Gestion des inscriptions
        Route::get('/inscriptions', [
            SuperAdminRegistrationController::class,
            'index'
        ])->name('inscriptions.index');

        Route::patch('/inscriptions/{user}/accept', [
            SuperAdminRegistrationController::class,
            'accept'
        ])->name('inscriptions.accept');

        Route::patch('/inscriptions/{user}/reject', [
            SuperAdminRegistrationController::class,
            'reject'
        ])->name('inscriptions.reject');

        Route::delete('/inscriptions/{user}', [
            SuperAdminRegistrationController::class,
            'destroy'
        ])->name('inscriptions.destroy');

    });


/*
|--------------------------------------------------------------------------
| Profil utilisateur
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/profile', [
        ProfileController::class,
        'edit'
    ])->name('profile.edit');

    Route::patch('/profile', [
        ProfileController::class,
        'update'
    ])->name('profile.update');

    Route::delete('/profile', [
        ProfileController::class,
        'destroy'
    ])->name('profile.destroy');


    // Photo de profil
    Route::post('/profile/photo', [
        ProfileController::class,
        'updatePhoto'
    ])->name('profile.photo.update');

    Route::delete('/profile/photo', [
        ProfileController::class,
        'destroyPhoto'
    ])->name('profile.photo.destroy');

});


/*
|--------------------------------------------------------------------------
| Confirmation inscription étudiant
|--------------------------------------------------------------------------
*/

Route::get('/confirmation-inscription', [
    ConfirmationController::class,
    'show'
])->name('confirmation.show');

Route::post('/confirmation-inscription', [
    ConfirmationController::class,
    'confirm'
])->name('confirmation.confirm');


/*
|--------------------------------------------------------------------------
| Quiz étudiant - accès sécurisé
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/quiz/{quiz}', [
        QuizController::class,
        'show'
    ])->name('quiz.show');

    Route::post('/quiz/{quiz}/submit', [
        QuizController::class,
        'submit'
    ])->name('quiz.submit');

});


/*
|--------------------------------------------------------------------------
| Espace d'apprentissage étudiant
|--------------------------------------------------------------------------
*/

Route::get('/formations/{formation}/learn', function (
    \App\Models\Formation $formation
) {

    $user = auth()->user();

    $studentFormation = $user->formations()
        ->where('formations.id', $formation->id)
        ->first();

    if (
        !$studentFormation ||
        $studentFormation->pivot->status !== 'active'
    ) {
        abort(403, 'Vous n’avez pas accès à cette formation.');
    }

    $formation->load([
        'cours',
        'quizzes.questions'
    ]);

    return view('formations.learn', compact('formation'));

})->middleware('auth')->name('formations.learn');


/*
|--------------------------------------------------------------------------
| Demande d'accès à une formation
|--------------------------------------------------------------------------
*/

Route::post('/formations/{formation}/request', function (
    \App\Models\Formation $formation
) {

    $user = auth()->user();

    $existingFormation = $user->formations()
        ->where('formations.id', $formation->id)
        ->first();

    if ($existingFormation) {

        $status = $existingFormation->pivot->status;

        if ($status === 'active') {
            return back()->with(
                'formation_message',
                'Vous avez déjà accès à cette formation.'
            );
        }

        if ($status === 'pending') {
            return back()->with(
                'formation_message',
                'Votre demande est déjà en attente de traitement.'
            );
        }

        $user->formations()->updateExistingPivot($formation->id, [
            'status' => 'pending',
            'activated_at' => null,
        ]);

    } else {

        $user->formations()->attach($formation->id, [
            'status' => 'pending',
            'activated_at' => null,
        ]);

    }

    return back()->with(
        'formation_message',
        'Votre demande a été envoyée à l’administration avec succès.'
    );

})->middleware('auth')->name('formations.request');


/*
|--------------------------------------------------------------------------
| Progression des leçons
|--------------------------------------------------------------------------
*/

Route::post(
    '/formations/{formation}/cours/{cours}/progress',
    [LessonProgressController::class, 'update']
)->middleware('auth')->name('lesson-progress.update');


/*
|--------------------------------------------------------------------------
| Storage
|--------------------------------------------------------------------------
*/

Route::get('/fix-storage', function () {

    $link = public_path('storage');

    if (file_exists($link)) {
        return 'Le lien existe déjà : ' . $link;
    }

    Artisan::call('storage:link');

    return Artisan::output();

})->middleware('auth');


/*
|--------------------------------------------------------------------------
| Authentification
|--------------------------------------------------------------------------
*/

require __DIR__ . '/auth.php';
