<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyCard extends Model
{
    use HasFactory;
    public $fillable = [
        "ktp",
        "maried_certificated",
        "form",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
