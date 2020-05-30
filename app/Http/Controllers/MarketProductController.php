<?php

namespace App\Http\Controllers;

use App\Market;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarketProductRequest;
use App\MarketProduct;
use App\PriceHistory;

class MarketProductController extends Controller
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
        })->cursor();

        return view('admin.marketPrices.index', compact('markets'));
    }

    public function create()
    {
        $markets = Market::all()->pluck('name', 'id')->prepend("Please select", '');
        $products = Product::all()->pluck('name', 'id')->prepend("Please select", '');
        return view('admin.marketPrices.create', compact('markets', 'products'));
    }

    public function store(StoreMarketProductRequest $request)
    {
        $user = auth()->user();

        $data = $request->validated();
        $marketProduct = MarketProduct::updateOrCreate(
                                            ['product_id' => $data['product'] , 'market_id' => $data['market']],
                                            ["price" => $data['price'], "created_by" => $user->id]
                                            );
                                        
        PriceHistory::create([
            'market_product_id' => $marketProduct->id,
            'price' => $data['price'],
            'created_by' => $user->id
        ]);

        return redirect()->route('admin.market-prices.index', app()->getLocale())->withSuccess('Market Price added.');
    }

    public function histories($locale, Market $market, Product $product)
    {
        $marketHistories = $market->products()->where('product_id', $product->id)->first()->priceHistories ?? [];

        return view('admin.marketPrices.history', compact('marketHistories', 'market', 'product'));
    }
}
