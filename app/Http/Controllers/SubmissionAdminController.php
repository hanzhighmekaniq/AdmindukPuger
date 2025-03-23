<?php

namespace App\Http\Controllers;

use App\Models\Ektp;
use App\Models\DieCertif;
use App\Models\FamilyCard;
use App\Models\BirthCertif;
use App\Models\MovingLater;
use App\Models\Submission;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SubmissionAdminController extends Controller
{

    public function index()
    {
        $submissions = Submission::with([
            'type',         // Relasi belongsTo ke Type
            'BirthCertifs', // Relasi hasMany
            'DieCertifs',   // Relasi hasMany
            'Ektps',        // Relasi hasMany
            'FamilyCards',  // Relasi hasMany
            'MovingLetters' // Relasi hasMany
        ])->paginate(10);

        return view('admin.submission', compact('submissions'));
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
