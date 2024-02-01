<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Repositories\TaskRepository;
use App\Http\Requests\FormTaskRequest;

class TaskController extends Controller
{
    protected $TaskRepository;
    public function __construct(TaskRepository $TaskRepository)
    {
        $this->TaskRepository = $TaskRepository;
    }


    public function index(Request $request)
    {
        $ProjectsFilter = Project::all();
        $Task = $request->route('task');
        $Tasks = $this->TaskRepository->getData();
        return view('Tasks.index', compact('Tasks', 'ProjectsFilter', 'Task'));
    }


    public function create()
    {
        $ProjectsFilter = Project::all();
        return view('Tasks.create', compact('ProjectsFilter'));
    }


    public function store(FormTaskRequest $request)
    {
        $this->TaskRepository->create($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès !');
    }


    public function show(Task $task)
    {
        return view('Tasks.show', compact('task'));

    }


    public function edit(Task $task)
    {
        // Fetch all projects to be used for task editing
        $projects = Project::all();
        return view('Tasks.edit', compact('task', 'projects'));
    }


    public function update(FormTaskRequest $request, Task $task)
    {
        $this->TaskRepository->edit($request->validated(), $task);
        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour avec succès !');
    }


    public function destroy(Task $task)
    {
        $this->TaskRepository->destroy($task);
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée avec succès !');
    }
}