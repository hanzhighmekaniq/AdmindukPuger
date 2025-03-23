<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MovingLetter extends Model
{
    use HasFactory;

    public $fillable = [
        'kk',
        'ktp',
        'maried_certificate',
        'moving_later_certificate',
        'consent_partner',
        'user_id',
        "notes",
        "status",
        "name",
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
