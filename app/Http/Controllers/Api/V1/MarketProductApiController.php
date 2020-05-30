<?php

namespace App\Http\Controllers\Api\V1;

use App\Market;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MarketCollection;
use App\Repositories\PriceHistoryInterface;
use App\Repositories\MarketProductInterface;
use App\Http\Requests\StoreMarketProductApiRequest;
use App\Http\Resources\MarketProduct as MarketProductResource;

class MarketProductApiController extends Controller
{
    use ApiResponser;

    protected $marketProductRepo, $priceHistoryRepo;

    public function __construct(MarketProductInterface $marketProduct, PriceHistoryInterface $priceHistory)
    {
        $this->marketProductRepo = $marketProduct;
        $this->priceHistoryRepo = $priceHistory;
    }

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

    public function store(StoreMarketProductApiRequest $request)
    {
        $data = $request->validated();

        $user = auth()->user();

        $marketProduct = $this->marketProductRepo->updateOrCreate($data, ["price" => $data['price'], "user_id" => $user->id]);
                                        
        $priceHistory = $this->priceHistoryRepo->store([
                                                'market_product_id' => $marketProduct->id,
                                                'price' => $data['price'],
                                                'created_by' => $user->id
                                                ]);

        $collection = new MarketProductResource($marketProduct);
        
        return $this->createdSuccessWithMsg('Market Prices Created Successfully!', $collection);
    }
}