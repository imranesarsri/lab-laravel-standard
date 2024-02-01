<?php
namespace App\Repositories;

use App\Models\Project;

class ProjectRepository extends BaseRepository
{
    public function __construct(Project $Project)
    {
        parent::__construct($Project);
    }
    public function getData()
    {
        return parent::getData()->paginate(5);
    }
    public function projectsFilter()
    {
        return parent::getData()->select('id', 'name')->get();
    }

}