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

     public function downloadcocs(Request $request, $id)    {
        $docs = Document::find($id);
        $pathToFile = public_path('public/documents/'.$docs->doc);
        return response()->download($pathToFile);
     }
}
