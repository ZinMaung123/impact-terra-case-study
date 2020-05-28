<?php

namespace App\Http\Controllers\Api\V1;

use App\Market;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MarketCollection;
use App\Http\Resources\Market as MarketResource;

class MarketProductApiController extends Controller
{
    public function index(Request $request)
    {
        $markets = Market::with(["products" => function($query) use ($request){
                            $query->when($request->has('product_id') && $request->product_id, function($productQuery) use ($request){
                                $productQuery->where('products.id', $request->product_id);
                            });
                        }, "products.priceHistories"])
                        ->when($request->has('market_id') && $request->market_id, function($query) use ($request){
                            $query->where('id', $request->market_id);
                        })->paginate(5);

        return new MarketCollection($markets);
    }
}
