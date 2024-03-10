<?php
namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $project)
    {
        parent::__construct($project);
    }

    protected function applySearchCriteria($query, $searchValue)
    {
        return $query->where('name', 'like', '%' . $searchValue . '%');
    }

    protected function applyFilterCriteria($query, $filterValue)
    {
        return $query->where('id', $filterValue);
    }

    public function searchAndFilter($request)
    {
        return parent::searchAndFilter($request)->paginate(5);
    }

    public function projectFilters()
    {
        return Project::select('id', 'name')->get();
    }
}
