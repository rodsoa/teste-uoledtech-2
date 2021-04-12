<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Student extends Model
{
    protected $table = 'alunos';

    /** @var array */
    protected $fillable = [
        'nome',
        'email',
        'senha',
    ];

    public function enrollments(): HasMany
    {
        return $this->hasMany(Enrollment::class, 'aluno_id');
    }
}
