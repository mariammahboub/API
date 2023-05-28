<?php

namespace App\Http\Resources\Product;
use App\Models\Model\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    protected $model = Product::class;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array<string, mixed>
     */
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
            'description' => $this->details,
            'price' => $this->price,
            'stock' => $this->stock == 0 ? 'Out o Stock' :$this->stock,
            'discount' => $this->discount,
            'Total Price'=>round((1 - ($this->discount/100))*$this->price , 2),
            'rating'=> $this->reviews->count()>0 ?
            round($this->reviews->sum('star')/$this->reviews->count(),2) : 'No rating yet',
            'href'=>[
                'reviews'=>route('reviews.index',$this->id)
            ],
        ];
    }
}
