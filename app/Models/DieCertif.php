<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DieCertif extends Model
{
    use HasFactory;
    public $fillable = [
        "name","form","death_certificate","maried_certificate","kk","ktp","user_id","status","notes",
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
