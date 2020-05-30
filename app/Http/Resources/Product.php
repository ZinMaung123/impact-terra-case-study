<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\User as UserResource;

class Product extends JsonResource
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
            'name' => $this->name,
            'price' => $this->whenPivotLoaded('products', function(){
                        return $this->pivot->price;
                    }),
            'created_by' => new UserResource($this->createdBy),
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'histories' => PriceHistory::collection($this->whenLoaded("priceHistories")),
        ];
    }
}
