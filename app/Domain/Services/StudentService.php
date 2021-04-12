<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Models\Student;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class StudentService
{
    public function model()
    {
        return Student::query();
    }

    public function create(array $data): Student
    {
        return $this->model()->create($data);
    }

    public function update(int $id, array $data): Student
    {
        $entity = $this->model()->findOrFail($id);
        $entity->fill($data);
        $entity->save();

        return $entity;
    }

    public function listAll(): Collection
    {
        return $this->model()->get();
    }

    public function findBy(string $field, string $value): Builder
    {
        return $this
            ->model()
            ->where($field, $value)
            ->get();
    }

    public function findById(int $id)
    {
        return $this
            ->model()
            ->findOrFail($id);
    }

    public function delete(int $id): void
    {
        $entity = $entity = $this->model()->findOrFail($id);

        throw_if($entity->enrollments->count(), \Exception::class, "Existem matrículas associadas ao curso");

        $entity->delete();
    }
}
