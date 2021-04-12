<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    /** @var string */
    protected $table = 'cursos';

    /** @var array */
    protected $fillable = [
        'nome',
        'data_inicio',
    ];

    /** @var array */
    protected $casts = [
        'data_inicio' => 'datetime',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'curso_id');
    }
}
