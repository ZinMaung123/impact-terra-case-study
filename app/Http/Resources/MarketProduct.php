<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MarketProduct extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'market' => new Market($this->market),
            'product' => new Product($this->product),
            'price' => $this->price,
            'created_by' => new User($this->createdBy)
        ];
    }
}
