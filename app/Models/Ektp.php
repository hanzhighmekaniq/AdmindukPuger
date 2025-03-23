<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ektp extends Model
{
    use HasFactory;

    public $fillable = [
        "kk",
        "name",
        "form",
        "submission_id",
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
