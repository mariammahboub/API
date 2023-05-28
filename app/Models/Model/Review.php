<?php

namespace App\Models\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table="reviews";
    protected  $fillable=['product_id','customer','review','star','created_at','updated_at'];
    protected $hidden=['created_at','updated_at'];
    public $timestamps=true;
}
