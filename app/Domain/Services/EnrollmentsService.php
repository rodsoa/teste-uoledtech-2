<?php

declare(strict_types=1);

namespace App\Domain\Services;

use App\Domain\Models\Enrollment;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class EnrollmentsService
{
    public function model()
    {
        return Enrollment::query();
    }

    public function create(array $data): Enrollment
    {
        return $this->model()->create($data);
    }

    public function update(int $id, array $data): Enrollment
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

    public function findById(int $id): ?Enrollment
    {
        return $this
            ->model()
            ->findOrFail($id);
    }

    public function delete(int $id): void
    {
        $entity = $entity = $this->model()->findOrFail($id);
        $entity->delete();
    }
}
