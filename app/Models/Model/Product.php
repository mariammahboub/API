<?php

namespace App\Models\Model;

use App\Models\Model\Review;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    
    protected $table = "products";
    protected $fillable = ['name', 'details', 'price', 'stock', 'discount', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at'];
    public $timestamps = true;

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
