<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class EmailVerificationPromptController extends Controller
{
    /**
     * Menampilkan halaman prompt verifikasi email (Vue.js).
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\Response
     */
    public function __invoke(Request $request)
    {
        // Jika email sudah diverifikasi, redirect ke dashboard
        if ($request->user()->hasVerifiedEmail()) {
            return redirect('/dashboard');
        }

        // Render halaman prompt verifikasi email
        return Inertia::render('Auth/VerifyEmail', [
            'status' => session('status'),
        ]);
    }
}
