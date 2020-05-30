<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface MarketProductInterface{

    /**
     * * Other queryings for only the MarketProductRepository 
     * * but not include in BaseRepository will need to implement here
     */
        
    /**
     * all
     *
     * @param  mixed $request
     */
    public function filterAndGetAll(Request $request);
    
       
    /**
     * updateOrCreate
     *
     * @param  mixed $conditionAttr
     * @param  mixed $values
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function updateOrCreate(array $conditionAttr, array $values = []): Model;
}