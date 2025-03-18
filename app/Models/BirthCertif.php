<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BirthCertif extends Model
{
    use HasFactory;
    public $fillable = [
        "form",
        "mom_ktp",
        "dad_ktp",
        "maried_certif",
        "birth_certificate",
        "new_kk",
        "witness1_ktp",
        "witness2_ktp",
        "user_id",
        "status",
        "note",


    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
