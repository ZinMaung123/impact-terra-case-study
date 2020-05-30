<?php

namespace App\Http\Controllers;

use App\Repositories\PriceHistoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PriceHistoryController extends Controller
{
    protected $priceHistoryRepo;

    public function __construct(PriceHistoryInterface $priceHistory)
    {
        $this->priceHistoryRepo = $priceHistory;
    }

    public function create(array $attributes): Model
    {
        return $this->priceHistoryRepo->store($attributes);
    }
}
