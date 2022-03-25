<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'description'=>$this->detail,
            'price'=>$this->price,
            'total_price'=> round((1-($this->discount)/100) * $this->price,2),
            'stock'=>$this->instock == 0 ? "Out of Stock" : $this->instock,
            'discount'=>$this->discount,
            'rating'=> $this->reviews->count() ?  round($this->reviews->sum('star')/$this->reviews->count(),2) : "No Rating Yet",
            'href' => [
                'reviews' => route('reviews.index',$this->id),
            ]
        ];
    }
}
