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
        "type_id",
        "name",
        "status",
        "notes"
    ];




    public function submission(): BelongsTo
    {
        return $this->belongsTo(Submission::class, 'user_id', 'id'); // Menentukan foreign key dan local key
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(Type::class, 'type_id', 'id'); // Menentukan foreign key dan local key
    }


    public function ektps(): HasMany
    {
        return $this->hasMany(Ektp::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }
    public function BirthCertifs(): HasMany
    {
        return $this->hasMany(BirthCertif::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }
    public function DieCertifs(): HasMany
    {
        return $this->hasMany(DieCertif::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }
    public function FamilyCards(): HasMany
    {
        return $this->hasMany(FamilyCard::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }
    public function MovingLetters(): HasMany
    {
        return $this->hasMany(MovingLetter::class, 'submission_id', 'id'); // Menentukan foreign key dan local key
    }
}
