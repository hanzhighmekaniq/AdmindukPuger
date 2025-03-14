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

     public function store(Request $request)
     {
         $request->validate([
             'name' => 'required'
         ]);
         $docs = Document::create([
             "name" => $request->name
         ]);
         return response()->json([
             "status" => 200,
             "data" => $docs,
             "response" => "Sukses Menambahkan Document"
         ]);
     }


}
