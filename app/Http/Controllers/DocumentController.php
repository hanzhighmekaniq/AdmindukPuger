<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Document::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;

            // Jika input adalah angka, cari berdasarkan ID
            if (is_numeric($search)) {
                $query->where('id', $search);
            } else {
                // Jika input bukan angka, cari berdasarkan nama (LIKE)
                $query->where('name', 'like', '%' . $search . '%');
            }
        }

        $doc = $query->paginate(10);

        return view('admin.document', compact('doc'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'required|file|mimes:pdf,doc,docx'
        ]);

        try {
            // Simpan file di folder 'documents' pada disk 'public'
            $filePath = $request->file('location')->store('documents', 'public');

            Document::create([
                'name' => $request->name,
                'location' => $filePath,
            ]);

            return redirect()->route('document.index')->with('success', 'Dokumen berhasil ditambahkan!');
        } catch (\Exception $e) {
            Log::error('Gagal menambahkan dokumen: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat menambahkan dokumen.');
        }
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
        $request->validate([
            'name' => 'required|string|max:255',
            'location' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        try {
            $document = Document::findOrFail($id);

            if ($request->hasFile('location')) {
                // Hapus file lama
                if ($document->location && Storage::exists($document->location)) {
                    Storage::delete($document->location);
                }

                // Simpan file baru
                $filePath = $request->file('location')->store('documents','public');
                $document->location = $filePath;
            }

            $document->name = $request->name;

            $document->save();   // Simpan perubahan
            $document->touch();  // Perbarui updated_at meskipun data tidak berubah

            return redirect()->route('document.index')->with('success', 'Dokumen berhasil diperbarui!');
        } catch (\Exception $e) {
            // Log error jika dibutuhkan
            Log::error('Gagal memperbarui dokumen: ' . $e->getMessage());

            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui dokumen.');
        }
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $document = Document::findOrFail($id);

        // Hapus file dari storage
        Storage::delete($document->location);

        // Hapus data dari database
        $document->delete();

        return redirect()->route('document.index')->with('success', 'Dokumen berhasil dihapus!');
    }
}
