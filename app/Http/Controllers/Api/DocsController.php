<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Document;

class DocsController extends Controller
{
    public function index()
    {
        $docs = Document::all();
          if ($docs->isEmpty()) {
         return response()->json("Tidak ada data ditemukan");
        } else {
         return response()->json([
             "status" => 200,
             "data" => $docs
            ]);
        }
     }

     public function downloadcocs($id)
{
    $docs = Document::find($id);
    if (!$docs) {
        return response()->json(['message' => 'Dokumen tidak ditemukan'], 404);
    }
    $pathToFile = public_path('storage/'.$docs->doc);
    if (!file_exists($pathToFile)) {
        return response()->json(['message' => 'File tidak ditemukan'], 404);
    }
    return response()->download($pathToFile);
}

}
