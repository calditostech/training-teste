<?php

namespace App\Repositories;

use App\Models\Training;

class TrainingRepository implements TrainingRepositoryInterface
{
    public function all()
    {
        return Training::all();
    }

    public function find($id)
    {
        return Training::findOrFail($id);
    }

    public function create(array $data)
    {
        return Training::create($data);
    }

    public function update($id, array $data)
    {
        $training = $this->find($id);
        $training->update($data);
        return $training;
    }

    public function delete($id)
    {
        $training = $this->find($id);
        $training->delete();
        return $training;
    }
}
