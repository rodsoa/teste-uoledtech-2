<?php

declare(strict_types=1);

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Enrollment extends Model
{
    /** @var string */
    protected $table = 'matriculas';

    /** @var array */
    protected $fillable = [
        'curso_id',
        'aluno_id',
        'ativo',
        'data_admissao',
    ];

    /** @var array */
    protected $casts = [
        'data_admissao' => 'datetime',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(Student::class, 'aluno_id');
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'curso_id');
    }
}