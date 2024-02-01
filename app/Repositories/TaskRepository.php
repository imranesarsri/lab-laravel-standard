<?php
namespace App\Repositories;

use App\Models\Task;
use App\Http\Requests\FormTaskRequest;


class TaskRepository extends BaseRepository
{
    public function __construct(Task $Task)
    {
        parent::__construct($Task);
    }
    //  $Tasks = Task::with('project')->paginate(5);

    public function getData()
    {
        return parent::getData()->with('project')->paginate(5);
    }



    // public function projectsFilter()
    // {
    //     return parent::getData()->select('id', 'name')->get();
    // }

}
