<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table="products";
    protected  $fillable=['name','details','price','stock','discount','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=true;
}
