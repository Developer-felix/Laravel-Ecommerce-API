<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'total_price'=> round((1-($this->discount)/100) * $this->price,2),
            'rating'=> $this->reviews->count() ?  round($this->reviews->sum('star')/$this->reviews->count(),2) : "No Rating Yet",
            'href' => [
                'reviews' => route('products.show',$this->id),
            ]
        ];
    }
}
