<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Submission;

class FamilyCard extends Model
{
    use HasFactory;
    public $fillable = [
        "ktp",
        "type",
        "maried_certificated",
        "form",
        "submission_id",
        "name",

    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
