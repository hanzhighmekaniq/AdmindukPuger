<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   public function store(LoginRequest $request): RedirectResponse
{
    try {
        $request->authenticate();
        $request->session()->regenerate();

        // Cek apakah user adalah admin
        if (Auth::user()->role !== 'admin') {
            Auth::logout(); // Logout jika bukan admin
            return redirect()->route('login')->with('error', 'Anda tidak memiliki akses sebagai admin.');
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    } catch (\Exception $e) {
        // Opsional: Log error untuk debugging
        \Log::error('Login error: ' . $e->getMessage());

        return redirect()->route('login')->with('error', 'Terjadi kesalahan saat login. Silahkan coba lagi.');
    }
}


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
