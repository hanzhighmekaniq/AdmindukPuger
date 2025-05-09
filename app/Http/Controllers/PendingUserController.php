<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\PendingUser;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class PendingUserController extends Controller
{
    // Form Registrasi
    public function showRegisterForm()
    {
        return view('register');
    }

    // Proses Registrasi
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pending_users|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $token = Str::random(32);

        $pendingUser = PendingUser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'token' => $token,
        ]);

        // Kirim email verifikasi
        Mail::raw("Klik link ini untuk verifikasi akun Anda: " . url("/verify/$token"), function ($message) use ($request) {
            $message->to($request->email)
                ->subject('Verifikasi Akun Anda');
        });

        return back()->with('success', 'Silakan cek email untuk verifikasi!');
    }

    // Proses Verifikasi
    public function verify($token)
    {
        $pendingUser = PendingUser::where('token', $token)->first();

        if (!$pendingUser) {
            return redirect('/register')->with('error', 'Token tidak valid atau sudah digunakan.');
        }

        // Pindahkan data ke tabel users
        User::create([
            'name' => $pendingUser->name,
            'email' => $pendingUser->email,
            'password' => $pendingUser->password, // Password sudah di-hash
        ]);

        // Hapus data dari pending_users
        $pendingUser->delete();

        return redirect('/login')->with('success', 'Akun berhasil diverifikasi, silakan login.');
    }
}
