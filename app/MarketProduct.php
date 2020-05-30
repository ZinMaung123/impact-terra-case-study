<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MarketProduct extends Model
{
    use SoftDeletes;

    protected $table = "market_product";

    protected $fillable = [
        "market_id",
        "product_id",
        "price",
        "created_by",
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function createdBy()
    {
        return $this->hasOne(User::class, 'id', 'created_by');
    }

    public function product()
    {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }

    public function market()
    {
        return $this->hasOne(Market::class, 'id', 'market_id');
    }
}
