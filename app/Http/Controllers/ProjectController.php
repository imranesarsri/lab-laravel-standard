<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests\FormTaskRequest;

class ProjectController extends Controller
{
    protected $projectRepository;

    public function __construct(ProjectRepository $projectRepository)
    {
        $this->projectRepository = $projectRepository;
    }

    public function index(Request $request)
    {
        $projects = $this->projectRepository->searchAndFilter($request);
        $projectsFilter = $this->projectRepository->projectFilters();
        if ($request->ajax()) {
            return view('Projects.search', compact('projects'))->render();
        }
        return view('Projects.index', compact('projects', 'projectsFilter'));
    }

}