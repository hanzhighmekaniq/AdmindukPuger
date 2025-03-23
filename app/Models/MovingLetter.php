<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MovingLetter extends Model
{
    use HasFactory;

    public $fillable = [
        'kk',
        'ktp',
        'maried_certificate',
        'moving_later_certificate',
        'consent_partner',
        'submission_id',
        "name",
    ];

    public function submission(): BelongsTo
    {
        return $this->belongsTo(submission::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }

}
