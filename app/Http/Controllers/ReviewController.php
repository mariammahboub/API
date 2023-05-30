<?php

namespace App\Http\Controllers;

use App\Models\Model\Review; 
use App\Models\Model\Product;  
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Http\Resources\Review\ReviewResource;
use Illuminate\Http\Request; // Add this line

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews);

    }

    // ... 
    
    public function store(ReviewRequest $request, Product $product) 
    {
        $review = new Review($request->all());
        $product->reviews()->save($review);
        
        return response([
            'data' => $review 
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Product $product, Review $review)
    {
        $review->update($request->all());
        return response([
            'data' => $review 
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product, Review $review)
    {
        $review->delete();
        return response( 'null', 204);
    }
}
