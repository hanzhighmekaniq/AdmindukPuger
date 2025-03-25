<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BirthCertif;
use App\Models\DieCertif;
use App\Models\Ektp;
use App\Models\FamilyCard;
use App\Models\MovingLater;
use App\Models\MovingLetter;
use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function newektp(Request $req)
{
    try {
        $req->validate([
            "kk" => "required|file|max:20480", // 20MB
            "form" => "required|file|max:20480", // 20MB
            "user_id" => "required",
            "name" => "required"
        ]);
        $kkPath = null;
        $formPath = null;

        if ($req->hasFile('kk')) {
            $kkPath = $req->file('kk')->store('images', 'public');
        }

        if ($req->hasFile('form')) {
            $formPath = $req->file('form')->store('form', 'public');
        }
        $jsonData = [
            'kk' => $kkPath,
            'form' => $formPath,
        ];

        $submission = Submission::create([
            'name' => $req->name,
            'type' => 'KTP',
            'data' => json_encode($jsonData),
            'user_id' => $req->user_id,
            'status' => 'Diproses',
            'notes' => null,
        ]);

        return response()->json([
            "status" => 200,
            "data" => $submission
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage()
        ], 500);
    }
}

public function newkk(Request $req)
{
    try {
        $req->validate([
            "ktp" => "required|file|max:20480",
            "maried_certificated" => "required|file|max:20480",
            "form" => "required|file|max:20480",
            "user_id" => "required",
            "name" => "required"
        ]);

        $ktpPath = null;
        $formPath = null;
        $marriedCertifPath = null;

        if ($req->hasFile('ktp')) {
            $ktpPath = $req->file('ktp')->store('images', 'public');
        }

        if ($req->hasFile('form')) {
            $formPath = $req->file('form')->store('form', 'public');
        }

        if ($req->hasFile('maried_certificated')) {
            $marriedCertifPath = $req->file('maried_certificated')->store('images', 'public');
        }

        // Siapin JSON buat data kolom
        $jsonData = [
            'ktp' => $ktpPath,
            'form' => $formPath,
            'maried_certificated' => $marriedCertifPath,
        ];

        $submission = Submission::create([
            'name' => $req->name,
            'type' => 'Kartu Keluarga',
            'data' => json_encode($jsonData),
            'user_id' => $req->user_id,
            'status' => 'Diproses',
            'notes' => null,
        ]);

        return response()->json([
            "status" => 200,
            "data" => $submission
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage()
        ], 500);
    }
}

public function birthcertif(Request $request)
{
    try {
        $request->validate([
            "form" => "required|file|max:20480",
            "mom_ktp" => "required|file|max:20480",
            "dad_ktp" => "required|file|max:20480",
            "maried_certif" => "required|file|max:20480",
            "birth_certificate" => "required|file|max:20480",
            "new_kk" => "required|file|max:20480",
            "witness1_ktp" => "required|file|max:20480",
            "witness2_ktp" => "required|file|max:20480",
            "user_id" => "required",
            "name" => "required"
        ]);

        // Simpan file dan path-nya
        $formPath = $request->file('form')->store('form', 'public');
        $momKtpPath = $request->file('mom_ktp')->store('images', 'public');
        $dadKtpPath = $request->file('dad_ktp')->store('images', 'public');
        $marriedCertifPath = $request->file('maried_certif')->store('images', 'public');
        $birthCertifPath = $request->file('birth_certificate')->store('images', 'public');
        $newKkPath = $request->file('new_kk')->store('images', 'public');
        $witness1Path = $request->file('witness1_ktp')->store('images', 'public');
        $witness2Path = $request->file('witness2_ktp')->store('images', 'public');
        $jsonData = [
            'form' => $formPath,
            'mom_ktp' => $momKtpPath,
            'dad_ktp' => $dadKtpPath,
            'maried_certif' => $marriedCertifPath,
            'birth_certificate' => $birthCertifPath,
            'new_kk' => $newKkPath,
            'witness1_ktp' => $witness1Path,
            'witness2_ktp' => $witness2Path,
        ];

        $submission = Submission::create([
            'name' => $request->name,
            'type' => 'Akta Kelahiran',
            'data' => json_encode($jsonData),
            'user_id' => $request->user_id,
            'status' => 'Diproses',
            'notes' => null,
        ]);

        return response()->json([
            "status" => 200,
            "data" => $submission
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => 500,
            "message" => $e->getMessage()
        ], 500);
    }
}

public function diecertif(Request $req)
{
    try {
        $req->validate([
            "form" => "required|file|max:20480",
            "death_certificate" => "required|file|max:20480",
            "maried_certificate" => "nullable|file|max:20480",
            "kk" => "required|file|max:20480",
            "ktp" => "required|file|max:20480",
            "user_id" => "required",
            "name" => "required"
        ]);

        $formPath = $req->file('form')->store('form', 'public');
        $deathCertifPath = $req->file('death_certificate')->store('images', 'public');
        $kkPath = $req->file('kk')->store('images', 'public');
        $ktpPath = $req->file('ktp')->store('images', 'public');

        $mariedCertifPath = $req->hasFile('maried_certificate')
            ? $req->file('maried_certificate')->store('images', 'public')
            : 'Status Belum Menikah';

        $jsonData = [
            'form' => $formPath,
            'death_certificate' => $deathCertifPath,
            'maried_certificate' => $mariedCertifPath,
            'kk' => $kkPath,
            'ktp' => $ktpPath,
            'name' => $req->name
        ];

        $submission = Submission::create([
            'name' => $req->name,
            'type' => 'Akta Kematian',
            'data' => json_encode($jsonData),
            'user_id' => $req->user_id,
            'status' => 'Diproses',
            'notes' => null,
        ]);

        return response()->json([
            "status" => 200,
            "data" => $submission
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => 500,
            "message" => $e->getMessage()
        ], 500);
    }
}

public function movingletter(Request $req)
{
    try {
        $req->validate([
            'kk' => 'required|file|max:20480',
            'ktp' => 'required|file|max:20480',
            'maried_certificate' => 'required|file|max:20480',
            'moving_later_certificate' => 'required|file|max:20480',
            'consent_partner' => 'nullable|file|max:20480',
            'user_id' => 'required'
        ]);

        $kkPath = $req->file('kk')->store('images', 'public');
        $ktpPath = $req->file('ktp')->store('images', 'public');
        $mariedPath = $req->file('maried_certificate')->store('images', 'public');
        $movingPath = $req->file('moving_later_certificate')->store('images', 'public');

        // Jika tidak ada file consent_partner, simpan teks default "Sama Sama Setuju"
        $consentPath = $req->hasFile('consent_partner')
            ? $req->file('consent_partner')->store('images', 'public')
            : 'Sama Sama Setuju';

        // Bungkus semua data dalam format JSON
        $jsonData = [
            'kk' => $kkPath,
            'ktp' => $ktpPath,
            'maried_certificate' => $mariedPath,
            'moving_later_certificate' => $movingPath,
            'consent_partner' => $consentPath,
        ];

        $submission = Submission::create([
            'name' => $req->name,
            'type' => 'Surat Pindah',
            'data' => json_encode($jsonData),
            'user_id' => $req->user_id,
            'status' => 'Diproses',
            'notes' => null,
        ]);

        return response()->json([
            "status" => 200,
            "data" => $submission
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => 500,
            "message" => $e->getMessage(),
        ], 500);
    }
}


public function submission(Request $request)
{
    try {
        $userId = $request->user()->id;

        return response()->json([
            'status' => 200,
            'data' => [
                'ektp' => Submission::where('user_id', $userId)->where('type', 'KTP')->get(),
                'kk' => Submission::where('user_id', $userId)->where('type', 'Kartu Keluarga')->get(),
                'birth_certif' => Submission::where('user_id', $userId)->where('type', 'Akta Kelahiran')->get(),
                'die_certif' => Submission::where('user_id', $userId)->where('type', 'Akta Kematian')->get(),
                'moving_letter' => Submission::where('user_id', $userId)->where('type', 'Surat Pindah')->get(),
            ]
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage()
        ], 500);
    }
}



}
