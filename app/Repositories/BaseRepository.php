<?php
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

abstract class BaseRepository
{
    protected Model $model;

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

    public function update($obj, array $data)
    {
        return $obj->update($data);
    }

    public function delete($obj)
    {
        return $obj->delete();
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
            $query = $this->applySearchCriteria($query, $searchValue);
        }

        if ($filterValue && $filterValue !== "Tout le projets") {
            $query = $this->applyFilterCriteria($query, $filterValue);
        }

        return $query;
    }

    abstract protected function applySearchCriteria($query, $searchValue);

    abstract protected function applyFilterCriteria($query, $filterValue);
}
