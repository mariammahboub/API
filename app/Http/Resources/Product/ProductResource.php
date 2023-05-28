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
            'details' => $this->details,
            'price' => $this->price,
            'stock' => $this->stock,
            'discount' => $this->discount,
        ];
    }
}
