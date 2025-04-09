<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Kirim ulang email verifikasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Jika email sudah diverifikasi, redirect ke dashboard
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard');
        }

        // Kirim ulang email verifikasi
        $request->user()->sendEmailVerificationNotification();

        // Feedback sukses: email verifikasi telah dikirim ulang
        return back()->with('status', 'verification-link-sent');
    }
}
