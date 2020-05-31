<?php

namespace App\Http\Controllers;

use App\Market;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMarketProductRequest;
use App\MarketProduct;
use App\PriceHistory;
use App\Repositories\MarketProductInterface;
use App\Repositories\PriceHistoryInterface;

class MarketProductController extends Controller
{
    protected $marketProductRepo, $priceHistoryRepo;

    /**
     * * Use Service pattern to work together with multiple repository
     */
    public function __construct(MarketProductInterface $marketProduct, PriceHistoryInterface $priceHistory)
    {
        $this->marketProductRepo = $marketProduct;
        $this->priceHistoryRepo = $priceHistory;
    }

    public function index(Request $request)
    {
        $markets = $this->marketProductRepo->filterAndGetAll($request);

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
        
        $marketProduct = $this->marketProductRepo->updateOrCreate($data, ["price" => $data['price'], "user_id" => $user->id]);
                                        
        $priceHistory = $this->priceHistoryRepo->store([
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
    
    public static function generateCachedKey($filters){
        $cahchedKey = "market_product_all";

        $len = count($filters);
        $count = 1;
        foreach($filters as $key => $filter){

            $cahchedKey = "{$key}_{$filter}";
            if($len != $count){
                $cahchedKey .= "_";
            }
            $count++;
        }

        return $cahchedKey;
    }
}
