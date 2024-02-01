<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository
{
    private $Model;
    public function __construct(Model $model)
    {
        $this->Model = $model;
    }

    public function getData()
    {
        return $this->Model->query();
    }

    public function create($validatedData)
    {
        // dd($validatedData);
        return $this->Model->create($validatedData);
    }

    public function edit($validatedData, Model $model)
    {
        return $model->update($validatedData);
    }

    public function destroy(Model $task)
    {
        return $task->delete();
    }
}