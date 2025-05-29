<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Submission extends Model
{
    use HasFactory;
    protected $table = 'submissions';
    public $fillable = [
        "user_id",
        "type",
        "data",
        "name",
        "status",
        "notes",
        "subtype"
    ];


    public function user(): BelongsTo

    {
        return $this->belongsTo(User::class, 'user_id', 'id'); // Menentukan foreign key dan local key
    }
}
