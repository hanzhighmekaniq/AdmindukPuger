<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BirthCertif;
use App\Models\DieCertif;
use App\Models\Ektp;
use App\Models\FamilyCard;
use App\Models\MovingLater;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    public function newektp(Request $req)
    {
        try {
            // Validasi input
            $req->validate([
                "kk" => "required|file|max:20480", // 20MB
                "form" => "required|file|max:20480", // 20MB
                "user_id" => "required"
            ]);

            // Inisialisasi path file
            $kkPath = null;
            $formPath = null;

            // Periksa dan simpan file 'kk'
            if ($req->hasFile('kk')) {
                $kkPath = $req->file('kk')->store('images', 'public');
            }

            // Periksa dan simpan file 'form'
            if ($req->hasFile('form')) {
                $formPath = $req->file('form')->store('form', 'public');
            }
            $ktpData = $req->all();
            $ktpData['kk'] = $kkPath;
            $ktpData['form'] = $formPath;
            $ktpData['status'] = "proses";
            $ktp = Ektp::create($ktpData);
            return response()->json([
                "status" => 200,
                "data" => $ktp
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => $e->getMessage()
            ], 500);
        }
    }

public function newkk(Request $req){
    try {
        // Validasi input
        $req->validate([
            "ktp" => "required|file|max:20480", // 20MB
            "maried_certificated" => "required|file|max:20480", // 20MB
            "form" => "required|file|max:20480", // 20MB
            "user_id" => "required"
        ]);
        $imagePath = null;
        $formPath = null;
        $mariedcertifPath = null;
        $status = "proses";

        if ($req->hasFile('ktp')) {
            $imagePath = $req->file('ktp')->store('images', 'public');
        }
        if ($req->hasFile('form')) {
            $formPath = $req->file('form')->store('form', 'public');
        }
        if ($req->hasFile('maried_certificated')) {
            $mariedcertifPath = $req->file('maried_certificated')->store('images', 'public');
        }
        $data = $req->all();
        $data['ktp'] = $imagePath;
        $data['form'] = $formPath;
        $data['maried_certificated'] = $mariedcertifPath;
        $data['status'] = $status;
        $ktp = FamilyCard::create($data);
        return response()->json([
            "status" => 200,
            "data" => $ktp
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 500,
            'message' => $e->getMessage()
        ], 500);
    }
}

public function birthcertif(Request $request){
    try {
        $request->validate([
            "form" => "required|file:max:20480",
            "mom_ktp" => "required|file:max:20480",
            "dad_ktp" => "required|file:max:20480",
            "maried_certif" => "required|file:max:20480",
            "birth_certificate" => "required|file:max:20480",
            "new_kk" => "required|file:max:20480",
            "witness1_ktp" => "required|file:max:20480",
            "witness2_ktp" => "required|file:max:20480",
            "user_id" => "required",
            "status" => "required"
        ]);
        $formpath = null;
        $mom_ktp_path=null;
        $dad_ktp_path = null;
        $mariedcertifPath = null;
        $birthcertif_path = null;
        $newkk_path = null;
        $witness1_path = null;
        $witness2_path = null;

        if($request->hasFile('form')){
            $formPath = request()->file('form')->store('form','public');
        }
        if($request->hasFile('mom_ktp')){
            $mom_ktp_path = request()->file('mom_ktp')->store('images','public');
        }
        if($request->hasFile('dad_ktp')){
            $dad_ktp_path = request()->file('dad_ktp')->store('images','public');
        }
        if($request->hasFile('birth_certificate')){
            $birthcertif_path = request()->file('birth_certificate')->store('images','public');
        }
        if($request->hasFile('maried_certif')){
            $mariedcertifPath = request()->file('maried_certif')->store('images','public');
        }
        if($request->hasFile('new_kk')){
            $newkk_path = request()->file('new_kk')->store('images','public');
        }
        if($request->hasFile('witness1_ktp')){
            $witness1_path = request()->file('witness1_ktp')->store('images','public');
        }
        if($request->hasFile('witness1_ktp')){
            $witness1_path = request()->file('witness1_ktp')->store('images','public');
        }
        if($request->hasFile('witness2_ktp')){
            $witness2_path = request()->file('witness2_ktp')->store('images','public');
        }

        $data = $request->all();
        $data['form'] = $formPath;
        $data['mom_ktp'] = $mom_ktp_path;
        $data['dad_ktp'] = $dad_ktp_path;
        $data['maried_certif'] = $mariedcertifPath;
        $data['birth_certificate'] = $birthcertif_path;
        $data['new_kk'] = $newkk_path;
        $data['witness1_ktp'] = $witness1_path;
        $data['witness2_ktp'] = $witness2_path;
        $data['status'] = "proses";
        $newbithsertif = BirthCertif::create($data);
        return response()->json([
            "status" => 200,
            "data" => $newbithsertif
        ]);
    } catch (\Exception $e) {
        return response()->json([
            "status" => 500,
            "message" => $e->getMessage()
        ],500);
    }
}

public function diecertif(Request $req){
try {
    $req->validate([
        "form" => "required|file:max:20480",
        "death_certificate" => "required|file:max:20480",
        "maried_certificate" => "file:max:20480",
        "kk" => "required|file:max:20480",
        "ktp" => "required|file:max:20480",
        "user_id" => "required",
    ]);
    $formPath = null;
    $deadcertifpath = null;
    $mariedcertifPath = null;
    $kkPath = null;
    $ktpPath = null;

    if ($req->hasFile('form')) {
        $formPath = $req->file('form')->store('form', 'public');
    }
    if ($req->hasFile('death_certificate')) {
        $deadcertifpath = $req->file('death_certificate')->store('images','public');
    }
    if ($req->hasFile('maried_certificate')){
        $mariedcertifPath = $req->file('maried_certificate')->store('images','public');
    }else{
        $mariedcertifPath = "Status Belum Menikah";
    }
    if($req->hasFile('kk')){
        $kkPath = $req->file('kk')->store('images','public');
    }
    if($req->hasFile('ktp')){
        $ktpPath = $req->file('ktp')->store('images','public');
    }
    $data = $req->all();
    $data['form'] = $formPath;
    $data['death_certificate'] = $deadcertifpath;
    $data['maried_certificate'] = $mariedcertifPath;
    $data['kk'] = $kkPath;
    $data['ktp'] = $ktpPath;
    $data['status'] = "proses";
    $diecertif = DieCertif::create($data);
    return response()->json([
        "status" => 200,
        "data" => $diecertif
    ]);
} catch (\Exception $e) {
    return response()->json([
        "status" => 500,
        "message" => $e->getMessage(),
    ]);

}
}

public function movingletter(Request $req){
try {
    $req->validate([
       'kk' => 'required|file:max:20480',
       'ktp' => 'required|file:max:20480',
       'maried_certificate' => 'required|file:max:20480',
       'moving_later_certificate' => 'required|file:max:20480',
       'consent_partner' => 'nullable|file:max:20480',
       'user_id' => 'required'
    ]);
    $kkPath = null;
    $ktpPath = null;
    $mariedPath = null;
    $movingPath = null;
    $consentPath = null;

    if ($req->hasFile('kk')) {
        $kkPath = $req->file('kk')->store('images','public');
    }
    if ($req->hasFile('ktp')) {
        $ktpPath = $req->file('ktp')->store('images','public');
    }
    if ($req->hasFile('maried_certificate')) {
        $mariedPath = $req->file('maried_certificate')->store('images','public');
    }
    if ($req->hasFile('moving_later_certificate')) {
        $movingPath = $req->file('moving_later_certificate')->store('images','public');
    }
    if ($req->hasFile('consent_partner')) {
        $consentPath = $req->file('consent_partner')->store('images','public');
    }else($consentPath = "Sama Sama Setuju");


    $data = $req->all();
    $data['kk'] = $kkPath;
    $data['ktp'] = $ktpPath;
    $data['maried_certificate'] = $mariedPath;
    $data['moving_later_certificate'] = $movingPath;
    $data['consent_partner'] = $consentPath;
    $data['status'] = "proses";
    $movingletter = MovingLater::create($data);

    return response()->json([
        "status" => 200,
        "data" => $movingletter
    ]);
} catch (\Exception $e) {
    return response()->json([
        "status" => 500,
        "message" => $e->getMessage(),
    ]);
}
}
}
