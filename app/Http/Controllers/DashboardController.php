<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $submissions = Submission::with('user')->paginate(9);

        // Menghitung jumlah submission berdasarkan status
        $allCount = Submission::count();
        $disetujuiCount = Submission::where('status', 'disetujui')->count();
        $ditolakCount = Submission::where('status', 'ditolak')->count();
        $diprosesCount = Submission::where('status', 'diproses')->count();

        return view('admin.dashboard', compact('submissions', 'allCount', 'disetujuiCount', 'ditolakCount', 'diprosesCount'));
    }
    public function success()
    {
        return view('auth.verify-seuccess');
    }
}
