<?php

namespace App\Http\Controllers;

use App\Models\Ektp;
use App\Models\DieCertif;
use App\Models\FamilyCard;
use App\Models\BirthCertif;
use App\Models\MovingLater;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SubmissionAdminController extends Controller
{

    public function index()
    {
        // Mengambil semua data dari berbagai tabel
        $birthCertifs = BirthCertif::with('user')->get()->map(function ($item) {
            $item->type = 'Akte Kelahiran';
            return $item;
        });

        $dieCertifs = DieCertif::with('user')->get()->map(function ($item) {
            $item->type = 'Akte Kematian';
            return $item;
        });

        $ektps = Ektp::with('user')->get()->map(function ($item) {
            $item->type = 'E-KTP';
            return $item;
        });

        $familyCards = FamilyCard::with('user')->get()->map(function ($item) {
            $item->type = 'Kartu Keluarga';
            return $item;
        });

        $movingLaters = MovingLater::with('user')->get()->map(function ($item) {
            $item->type = 'Surat Pindah';
            return $item;
        });

        // Gabungkan semua koleksi data menjadi satu
        $submissions = collect()
            ->merge($birthCertifs)
            ->merge($dieCertifs)
            ->merge($ektps)
            ->merge($familyCards)
            ->merge($movingLaters)
            ->sortByDesc('created_at'); // Urutkan berdasarkan tanggal terbaru

        // Pagination Manual
        $currentPage = request()->get('page', 1); // Ambil halaman saat ini
        $perPage = 1; // Jumlah data per halaman
        $currentItems = $submissions->slice(($currentPage - 1) * $perPage, $perPage)->values(); // Ambil data sesuai halaman

        $paginatedSubmissions = new LengthAwarePaginator(
            $currentItems,
            $submissions->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        return view('admin.submission', compact('paginatedSubmissions'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
