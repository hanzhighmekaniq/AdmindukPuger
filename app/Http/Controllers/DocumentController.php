<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
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

        $filePath = $request->file('location')->store('documents', 'public');

        Document::create([
            'name' => $request->name,
            'location' => $filePath, // Sesuai dengan model
        ]);


        return redirect()->route('document.index')->with('success', 'Dokumen berhasil ditambahkan!');
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
            'document_name' => 'required|string|max:255',
            'location' => 'nullable|file|mimes:pdf,doc,docx'
        ]);

        $document = Document::findOrFail($id);

        if ($request->hasFile('location')) {
            // Hapus file lama
            Storage::delete($document->location);

            // Simpan file baru
            $filePath = $request->file('location')->store('documents');
            $document->location = $filePath;
        }

        $document->name = $request->document_name;
        $document->save();

        return redirect()->route('document.index')->with('success', 'Dokumen berhasil diperbarui!');
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
