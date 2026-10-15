<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        // Statistiques des étudiants
        $totalStudents = User::where('role', 'student')->count();

        $pendingStudents = User::where('role', 'student')
            ->where('status', 'pending')
            ->count();

        $acceptedStudents = User::where('role', 'student')
            ->where('status', 'accepted')
            ->count();

        $confirmedStudents = User::where('role', 'student')
            ->where('status', 'confirmed')
            ->count();

        $rejectedStudents = User::where('role', 'student')
            ->where('status', 'rejected')
            ->count();

        // Notifications : inscriptions en attente
        $pendingRegistrations = User::where('role', 'student')
            ->where('status', 'pending')
            ->count();

        // Notifications : demandes de formation en attente
        $pendingFormationRequests = DB::table('user_formations')
            ->where('status', 'pending')
            ->count();

        // Afficher le dashboard avec toutes les données
        return view('admin.dashboard', compact(
            'totalStudents',
            'pendingStudents',
            'acceptedStudents',
            'confirmedStudents',
            'rejectedStudents',
            'pendingRegistrations',
            'pendingFormationRequests'
        ));
    }
}
