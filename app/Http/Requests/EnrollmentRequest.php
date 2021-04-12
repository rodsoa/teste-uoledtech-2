<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnrollmentRequest extends FormRequest
{
    const ACTION_STORE  = 'store';
    const ACTION_UPDATE = 'update';

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        switch (request()->route()->getActionMethod()) {
            case self::ACTION_STORE:
                return $this->onStore();
                break;
            case self::ACTION_UPDATE:
                return $this->onStore();
                break;
            default:
                return [];
                break;
        }
    }

    public function onStore(): array
    {
        return [
            'aluno_id' => 'required|exists:alunos',
            'curso_id' => 'required|exists:cursos',
            'ativo' => 'required|boolean'
        ];
    }

    public function onUpdate(): array
    {
        return [
            'aluno_id' => 'required|exists:alunos',
            'curso_id' => 'required|exists:cursos',
            'ativo' => 'required|boolean'
        ];
    }
}
