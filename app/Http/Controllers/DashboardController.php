<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Activity;

class DashboardController extends Controller
{
    /**
     * Menampilkan halaman dashboard.
     *
     * @return \Inertia\Response
     */
    public function index()
    {
        // Ambil data pengguna saat ini
        $user = auth()->user();

        // Ambil 5 aktivitas terbaru dari database
        $recentActivities = Activity::where('user_id', $user->id)
            ->take(5)
            ->get()
            ->map(function ($activity) {
                return [
                    'activity' => $activity->activity,
                    'type' => $activity->type,
                    'time' => $activity->created_at->diffForHumans(),
                ];
            });

        // Render halaman dashboard dengan data
        return Inertia::render('Dashboard', [
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'profile_picture' => 'https://storage.googleapis.com/a1aa/image/B8VBO3Na_g0q1cIARS2Sb9yWItnY0G0xIjQFhYYnuPA.jpg',
            ],
            'recentActivities' => $recentActivities,
        ]);
    }
}
