<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BirthCertif extends Model
{
    use HasFactory;
    public $fillable = [
        "form",
        "name",
        "mom_ktp",
        "dad_ktp",
        "maried_certif",
        "birth_certificate",
        "new_kk",
        "witness1_ktp",
        "witness2_ktp",
        "submission_id",
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
