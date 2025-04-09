<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Verified;

class VerifyEmailController extends Controller
{
    /**
     * Handle verifikasi email.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request)
    {
        // Middleware 'signed' dan 'auth' memastikan tautan valid dan pengguna terautentikasi

        $user = $request->user();

        if ($user->hasVerifiedEmail()) {
            return redirect('/dashboard'); // Redirect jika email sudah diverifikasi
        }

        // Tandai email sebagai diverifikasi
        if ($user->markEmailAsVerified()) {
            event(new Verified($user)); // Trigger event Verified
        }

        return redirect('/dashboard?verified=1'); // Redirect ke dashboard setelah verifikasi
    }
}
