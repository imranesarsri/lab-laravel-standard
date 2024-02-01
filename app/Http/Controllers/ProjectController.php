<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProjectRepository;
use App\Http\Requests\FormTaskRequest;

class ProjectController extends Controller
{
    protected $ProjectRepository;
    public function __construct(ProjectRepository $ProjectRepository)
    {
        $this->ProjectRepository = $ProjectRepository;
    }

    public function index(Request $request)
    {
        $Projects = $this->ProjectRepository->getData();
        $ProjectsFilter = $this->ProjectRepository->projectsFilter();
        if ($request->ajax()) {
            // Handle AJAX request and return rendered view
            return $this->handleAjaxRequest($request, $Projects, $ProjectsFilter);
        }
        return view('Projects.index', compact('Projects', 'ProjectsFilter'));
    }

    // ================================= Search and filter ===================================
// =======================================================================================
    private function handleAjaxRequest(Request $request, $Projects, $ProjectsFilter)
    {
        // Get the project query from the repository
        $query = $this->ProjectRepository->getData();

        // Get search and filter values from the request
        $searchTerm = str_replace(' ', '%', $request->get('searchTaskValue'));
        $filterValue = $request->get('selectProjrctValue');

        // Check if the view should display search results
        if ($this->ifSearchAndFilterEmpty($searchTerm, $filterValue)) {
            // Return rendered search view
            return view('Projects.search', compact('Projects', 'projectsFilter'))->render();
        }

        // Apply search if search term is present
        if ($searchTerm) {
            $Projects = $this->searchValue($query, $searchTerm);
        }

        // Apply filter if filter value is not "Tout le projets"
        if ($filterValue !== "Tout le projets") {
            $Projects = $this->FilterValue($query, $filterValue);
        }

        // Return rendered search view or updated projects view
        return view('Projects.search', compact('Projects', 'projectsFilter'))->render();
    }

    // Private method to check if the search view should be returned
    private function ifSearchAndFilterEmpty($searchTerm, $filterValue)
    {
        return empty($searchTerm) && $filterValue === "Tout le projets";
    }

    // Private method to apply search to the project query
    private function searchValue($query, $searchTerm)
    {
        return $query->where('name', 'like', '%' . $searchTerm . '%')->paginate(5);
    }

    // Private method to apply filter to the project query
    private function FilterValue($query, $filterValue)
    {
        return $query->where('name', 'like', '%' . $filterValue . '%')->paginate(5);
    }
    // =======================================================================================
// =======================================================================================
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