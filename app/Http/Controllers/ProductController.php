<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Model\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductCollection;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }
    
    public function index()
    {
        return ProductCollection::collection(Product::paginate(50));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->details = $request->details;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->save();
        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) // Update the parameter name to $product
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product) // Update the parameter name to $product
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductsRequest $request, Product $product) // Update the parameter name to $product
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) // Update the parameter name to $product
    {
        //
    }
}
