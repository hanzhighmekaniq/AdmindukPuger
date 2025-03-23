<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ektp extends Model
{
    use HasFactory;

    public $fillable = [
        "kk",
        "name",
        "form",
        "user_id",
        "status",
        "notes",
        
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
