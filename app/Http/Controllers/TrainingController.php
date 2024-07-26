<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TrainingRepository;
use Inertia\Inertia;

class TrainingController extends Controller
{
    protected $trainingRepo;

    public function __construct(TrainingRepository $trainingRepo)
    {
        $this->trainingRepo = $trainingRepo;
    }

    public function index()
    {
        $trainings = $this->trainingRepo->all();
        return Inertia::render('Trainings/Index', [
            'trainings' => $trainings,
        ]);
    }

    public function create()
    {
        return Inertia::render('Trainings/Form', [
            'isEdit' => false,
        ]);
    }

    public function show($id)
    {
        $training = $this->trainingRepo->find($id);
        return Inertia::render('Trainings/Show', [
            'training' => $training,
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $training = $this->trainingRepo->create($data);
        return redirect()->route('trainings.index');
    }

    public function edit($id)
    {
        $training = $this->trainingRepo->find($id);
        return Inertia::render('Trainings/Form', [
            'training' => $training,
            'isEdit' => true,
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        $training = $this->trainingRepo->update($id, $data);
        return redirect()->route('trainings.index');
    }

    public function destroy($id)
    {
        $this->trainingRepo->delete($id);
        return redirect()->route('trainings.index');
    }
}
