<?php

namespace App\Http\Controllers;
use Auth;
use Exception;
use Throwable;
use Illuminate\Http\Request;
use App\Models\Model\Product;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Response;
use App\Exceptions\ProductNotBelongsToUser;
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
        ],201);
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
public function update(Request $request, Product $product) // Update the parameter name to $product
{
    $this->ProductUserCheck($product);
    $request['details']= $request->description;
    unset($request['description']);
    $product->update($request->all());
    return response([
        'data' => new ProductResource($product)
    ],201);
}
public function ProductUserCheck($product){
    if(Auth::id() !== $product->user_id){
        throw new ProductNotBelongsToUser ;
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) // Update the parameter name to $product
    {
         $product->delete();
         return response('null',204);
    }
}
