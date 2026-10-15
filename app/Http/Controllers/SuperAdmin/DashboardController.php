<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Formation;
use Illuminate\View\View;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index(): View
    {
        // 1. Statistiques des étudiants
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

        // 2. Statistiques des administrateurs
        $totalAdmins = User::where('role', 'admin')->count();

        // 3. Nombre total de formations
        $totalFormations = Formation::count();

        // 4. Statistiques des étudiants par formation
        $formationsStats = Formation::query()
            ->withCount([
                'users as total_students_count' => function ($query) {
                    $query->where('users.role', 'student');
                },

                'users as active_students_count' => function ($query) {
                    $query->where('users.role', 'student')
                        ->where('user_formations.status', 'active');
                },
            ])
            ->orderByDesc('active_students_count')
            ->orderBy('name')
            ->get();

        // Données du graphique des formations
        $formationLabels = $formationsStats
            ->pluck('name')
            ->values();

        $formationStudentCounts = $formationsStats
            ->pluck('active_students_count')
            ->values();

        // 5. Dernières inscriptions
        $latestStudents = User::where('role', 'student')
            ->latest()
            ->take(5)
            ->get();

        // 6. Inscriptions des 6 derniers mois
        $monthlyLabels = [];
        $monthlyCounts = [];

        $startMonth = Carbon::now()
            ->startOfMonth()
            ->subMonths(5);

        for ($i = 0; $i < 6; $i++) {
            $month = $startMonth->copy()->addMonths($i);

            $monthlyLabels[] = $month->format('m/Y');

            $monthlyCounts[] = User::where('role', 'student')
                ->whereBetween('created_at', [
                    $month->copy()->startOfMonth(),
                    $month->copy()->endOfMonth(),
                ])
                ->count();
        }

        return view('superadmin.dashboard', compact(
            'totalStudents',
            'pendingStudents',
            'acceptedStudents',
            'confirmedStudents',
            'rejectedStudents',
            'totalAdmins',
            'totalFormations',
            'formationsStats',
            'formationLabels',
            'formationStudentCounts',
            'latestStudents',
            'monthlyLabels',
            'monthlyCounts'
        ));
    }
}
