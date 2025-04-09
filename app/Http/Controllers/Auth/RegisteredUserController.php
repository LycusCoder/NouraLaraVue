<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;

class RegisteredUserController extends Controller
{
    /**
     * Menampilkan halaman register (Vue.js).
     *
     * @return \Inertia\Response
     */
    public function create()
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle proses registrasi.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        try {
            // Buat pengguna baru
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Autentikasi pengguna setelah registrasi
            auth()->login($user);

            // Catat aktivitas registrasi berhasil
            ActivityLogger::log("User registered successfully", 'register');

            // Redirect ke dashboard dengan pesan sukses
            return redirect('/dashboard')->with('success', 'Account created successfully!');
        } catch (\Exception $e) {
            // Redirect kembali dengan pesan error
            return back()->withErrors([
                'email' => 'An error occurred during registration. Please try again.',
            ]);
        }
    }
}
