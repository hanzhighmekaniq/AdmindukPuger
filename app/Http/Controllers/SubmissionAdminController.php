<?php

namespace App\Http\Controllers;

use App\Models\Ektp;
use App\Models\Type;
use App\Models\DieCertif;
use App\Models\FamilyCard;
use App\Models\Submission;
use App\Models\BirthCertif;
use App\Models\MovingLater;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class SubmissionAdminController extends Controller
{

    public function index(Request $request)
    {
        // Ambil filter dari request
        $type = $request->input('type');
        $status = $request->input('status');
        $search = $request->input('name');

        // Query dasar dengan eager loading
        $query = Submission::with('user');

        // Terapkan filter berdasarkan type (jika dipilih)
        if (!empty($type)) {
            $query->where('type', $type);
        }

        // Terapkan filter berdasarkan status (jika dipilih)
        if (!empty($status)) {
            $query->where('status', $status);
        }

        // Terapkan filter pencarian berdasarkan nama (jika ada)
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Paginate hasil dengan mempertahankan query string
        $submissions = $query->paginate(10)->withQueryString();
        foreach ($submissions as $submission) {
            if (is_string($submission->data)) {
                $submission->data = json_decode($submission->data, true);
            }
        }
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
    public function update(Request $request, $id)
    {
        try {
            // Validasi input
            $request->validate([
                'status' => 'required|in:Disetujui,Ditolak,Diproses',
                'notes' => 'nullable|string|max:255',
            ]);

            // Ambil data submission berdasarkan ID
            $submission = Submission::findOrFail($id);

            // Update status
            $submission->status = $request->status;

            // Simpan notes hanya jika statusnya "Ditolak"
            if ($request->status === 'Ditolak') {
                $submission->notes = $request->notes;
            } else {
                $submission->notes = null; // Reset jika status bukan "Ditolak"
            }

            // Simpan perubahan
            $submission->save();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Status berhasil diperbarui.');
        } catch (\Exception $e) {
            // Tangani error dan tampilkan pesan
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            // Cari submission berdasarkan ID
            $submission = Submission::findOrFail($id);

            // Hapus submission
            $submission->delete();

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', 'Dokumen berhasil dihapus.');
        } catch (\Exception $e) {
            // Tangani error jika terjadi masalah
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
