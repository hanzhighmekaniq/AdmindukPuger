<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;

class PasswordResetLinkController extends Controller
{
    /**
     * Display the password reset link request view.
     */
    public function create(): View
    {
        return view('auth.forgot-password');
    }

    /**
     * Handle an incoming password reset link request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi email
        $request->validate([
            'email' => ['required', 'email'],
        ]);

        // Mengirim link reset password
        $status = Password::sendResetLink(
            $request->only('email')
        );

        // Menggunakan pesan kustom
        return $status == Password::RESET_LINK_SENT
            ? back()->with('status', __($status))  // Pesan berhasil reset password
            : back()->withInput($request->only('email'))
            ->withErrors(['email' => __($status)]);  // Pesan error reset password
    }
}
