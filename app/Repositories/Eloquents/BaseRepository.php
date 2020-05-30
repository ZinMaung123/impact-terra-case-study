<?php

namespace App\Repositories\Eloquents;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepositoryInterface;

class BaseRepository implements BaseRepositoryInterface{

    protected $model;
    
    /**
     * Inject eloquent model
     *
     * @param  mixed $model
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }
    
    /**
     * find a record
     *
     * @param  mixed $id
     * @return Model
     */
    public function find($id): ?Model
    {
        return $this->model->findOrFail($id);
    }
    
    /**
     * store a record to database
     *
     * @param  mixed $attributes   
     * @return \Illuminate\Database\Eloquent\Model;
     */
    public function store(array $attributes): Model
    {
        $model = $this->model->create($attributes);

        return $model;
    }

}