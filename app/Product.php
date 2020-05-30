<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        "name"
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function createdBy()
    {
        return $this->hasOneThrough(User::class, MarketProduct::class, 'product_id', 'id', 'id', 'created_by');
    }

    public function priceHistories(){
        return $this->hasManyThrough(PriceHistory::class, MarketProduct::class);
    }
}
