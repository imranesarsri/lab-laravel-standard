<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Project;

abstract class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getData()
    {
        return $this->model->query();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data)
    {
        return $model->update($data);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function searchAndFilter(Request $request)
    {
        $query = $this->getData();
        $searchValue = $request->input('searchTaskValue');
        $filterValue = $request->input('selectProjectValue');

        if (!$searchValue && $filterValue === "Tout le projets") {
            return $query;
        }

        if ($searchValue) {
            $this->applySearchCriteria($query, $searchValue);
        }

        if ($filterValue && $filterValue !== "Tout le projets") {
            $this->applyFilterCriteria($query, $filterValue);
        }
        return $query;
    }

    public function applySearchCriteria($query, $searchValue)
    {
        return $query;
    }

    public function applyFilterCriteria($query, $filterValue)
    {
        return $query;
    }

}