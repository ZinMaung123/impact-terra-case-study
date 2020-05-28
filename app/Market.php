<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Market extends Model
{
    use SoftDeletes;

    protected $table = "markets";

    protected $fillable = [
        "name", "description"
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    public function products()
    {
        return $this->belongsToMany( Product::class, 'market_product', 'market_id', 'product_id')
                    ->withPivot('price', 'created_by', 'created_at')
                    ->orderBy('pivot_created_at', 'desc');
    }

    public function priceHistories(){
        return $this->hasManyThrough(PriceHistory::class, MarketProduct::class);
    }
}
