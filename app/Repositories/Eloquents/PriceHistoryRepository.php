<?php

namespace App\Repositories\Eloquents;

use App\PriceHistory;
use App\Repositories\PriceHistoryInterface;

class PriceHistoryRepository extends BaseRepository implements PriceHistoryInterface{

    public function __construct(PriceHistory $priceHistory)
    {
        parent::__construct($priceHistory);
    }
}