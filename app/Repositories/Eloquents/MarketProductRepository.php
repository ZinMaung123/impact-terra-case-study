<?php

namespace App\Repositories\Eloquents;

use App\Market;
use App\MarketProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use App\Repositories\MarketProductInterface;
use App\Http\Controllers\MarketProductController;

class MarketProductRepository extends BaseRepository implements MarketProductInterface{

    public function __construct(MarketProduct $marketProduct)
    {
        parent::__construct($marketProduct);
    }

    public function filterAndGetAll(Request $request)
    {
        $filters = $request->all();

        $cahchedKey = MarketProductController::generateCachedKey($filters);

        return Cache::remember($cahchedKey, 60, function() use($request){
            $models = Market::with(["products" => function($query) use ($request){
                $query->when($request->has('product_id') && $request->product_id, function($productQuery) use ($request){
                    $productQuery->where('products.id', $request->product_id);
                });
            }, "products.priceHistories"])
            ->when($request->has('market_id') && $request->market_id, function($query) use ($request){
                $query->where('id', $request->market_id);
            })->get();

            return $models;
        });
    }

    public function updateOrCreate(array $conditionAttr, array $values = []): Model
    {

        $marketProduct = $this->model->updateOrCreate(
            ['product_id' => $conditionAttr['product_id'] , 'market_id' => $conditionAttr['market_id']],
            ["price" => $values['price'], "created_by" => $values['user_id']]
            );
            
        return $marketProduct;
    }
}