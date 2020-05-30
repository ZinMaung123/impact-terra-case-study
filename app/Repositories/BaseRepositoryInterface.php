<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface{
        
    /**
     * retrieving all records
     *
     * @return \Illuminate\Support\Collection;
     */
    public function all(): Collection;
    
    /**
     * retrieve a record
     *
     * @param  mixed $id
     * @return void
     */
    public function find($id): ?Model;
    
    /**
     * store a record in database
     *
     * @param  mixed $attributes
     * @return void
     */
    public function store(array $attributes): Model;


}