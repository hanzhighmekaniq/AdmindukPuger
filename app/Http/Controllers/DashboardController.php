<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $submissions = Submission::with([
            'type',
            'BirthCertifs',
            'DieCertifs',
            'Ektps',
            'FamilyCards',
            'MovingLetters'
        ])->orderBy('created_at', 'desc')->paginate(10); // Ambil 10 data terbaru

        // Hitung jumlah berdasarkan status
        $countAll = Submission::count();
        $countApproved = Submission::where('status', 'Disetujui')->count();
        $countRejected = Submission::where('status', 'Ditolak')->count();
        $countProcessing = Submission::where('status', 'Diperoses')->count();

        return view('admin.dashboard', compact(
            'submissions',
            'countAll',
            'countApproved',
            'countRejected',
            'countProcessing'
        ));
    }
}
