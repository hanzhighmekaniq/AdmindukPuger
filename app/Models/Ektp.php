<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ektp extends Model
{
    use HasFactory;

    public $fillable = [
        "kk",
        "form",
        "user_id"
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
