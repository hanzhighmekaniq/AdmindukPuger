<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Submission;


class DieCertif extends Model
{
    use HasFactory;
    public $fillable = [
        "name",
        "form",
        "death_certificate",
        "maried_certificate",
        "kk",
        "ktp",
        "submission_id",
    ];
    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
