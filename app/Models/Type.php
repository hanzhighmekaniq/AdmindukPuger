<?php

namespace App\Models;

use App\Models\Submission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;


class Type extends Model
{
    use HasFactory;
    protected $table = 'types';
    public $fillable = [
        "name",
    ];
    public function submissions(): HasMany
    {
        return $this->hasMany(Submission::class, 'type_id', 'id'); // Menentukan foreign key dan local key
    }
}
