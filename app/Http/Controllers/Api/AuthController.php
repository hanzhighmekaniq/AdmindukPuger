<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\VerifyEmail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required',
                'address' => 'required',
                'nik' => 'required',
                'nokk' => 'required'
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'address' => $request->address,
                'phone' => $request->phone,
                'role' => 'user',
                'nokk' => $request->nokk,
                'nik' => $request->nik
            ]);

            // Kirim email verifikasi
            event(new Registered($user));
            return response()->json([
                'message' => 'Pendaftran berhasil, Cek Email Untuk Verifikasi',
                'user' => $user,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();

        if (!$user->hasVerifiedEmail()) {
            Log::info("Resend verifikasi email ke: " . $user->email);
            $user->sendEmailVerificationNotification();

            return response()->json([
                'success' => false,
                'message' => 'Email belum diverifikasi. Link verifikasi baru telah dikirim ke email Anda.',
                'email_verified' => false,
                'user_id' => $user->id
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }


    // Tambahkan di AuthController
    public function resendVerificationEmailById(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $user = User::findOrFail($request->user_id);

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'message' => 'Email already verified.',
            ], 400);
        }

        $user->sendEmailVerificationNotification();

        return response()->json([
            'success' => true,
            'message' => 'Verification link sent!',
        ]);
    }


    public function verifyEmail(Request $request, $id, $hash)
    {
        $user = User::findOrFail($id);

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid verification link',
            ], 403);
        }

        if ($user->hasVerifiedEmail()) {
            return response()->json([
                'success' => true,
                'message' => 'Email already verified',
            ]);
        }

        if ($user->markEmailAsVerified()) {
            event(new Verified($user));
        }

        return response()->json([
            'success' => true,
            'message' => 'Email verified successfully',
        ]);
    }




    public function logout(Request $request)
    {
        try {
            $user = Auth::user();
            if ($user) {
                $user->tokens()->delete();
                return response()->json([
                    'message' => 'Logout success'
                ]);
            } else {
                return response()->json([
                    'message' => 'User not authenticated'
                ], 401);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function updateprofile(Request $request)
    {
        try {
            // Validasi request
            $request->validate([
                'name' => 'nullable',
                'email' => 'nullable|email',
                'phone' => "nullable",
                'password' => 'nullable|min:8',
                'nik' => 'nullable',
                'nokk' => 'nullable'
            ]);
            $user = Auth::user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->nik = $request->nik;
            $user->nokk = $request->nokk;
            // Jika password diinputkan, maka update password
            if ($request->filled('password')) {
                $user->password = ($request->password);
            }
            $user->save();
            return response()->json([
                'message' => 'User updated successfully',
                'user' => $user
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
