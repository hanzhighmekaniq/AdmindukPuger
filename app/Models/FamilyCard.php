<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FamilyCard extends Model
{
    use HasFactory;
    public $fillable = [
        "ktp",
        "maried_certificated",
        "form",
        "submission_id",
        "name",

    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
