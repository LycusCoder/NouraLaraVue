<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityLogger
{
    /**
     * Log an activity for the currently authenticated user.
     *
     * @param string $activity
     * @param string $type
     * @return void
     */
    public static function log(string $activity, string $type): void
    {
        // Pastikan pengguna telah login
        if (Auth::check()) {
            Activity::create([
                'user_id' => Auth::id(),
                'activity' => $activity,
                'type' => $type,
            ]);
        } else {
            // Jika tidak ada pengguna yang login, Anda bisa melempar exception atau logging manual
            throw new \Exception('No authenticated user found to log activity.');
        }
    }
}
