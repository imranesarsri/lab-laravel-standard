<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests\FormTaskRequest;
use App\Models\Task;
use App\Models\Project;

class ProjectController extends Controller
{
    protected $ProjectRepository;
    public function __construct(ProjectRepository $ProjectRepository)
    {
        $this->ProjectRepository = $ProjectRepository;
    }

    public function index()
    {
        $Projects = $this->ProjectRepository->getData();
        $ProjectsFilter = $this->ProjectRepository->projectsFilter();
        return view('Projects.index', compact('Projects', 'ProjectsFilter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(FormTaskRequest $request)
    {
        $this->ProjectRepository->create($request->validated());
    }

}