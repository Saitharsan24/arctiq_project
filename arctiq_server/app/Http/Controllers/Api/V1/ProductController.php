<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\ProductResource;
use App\Http\Resources\v1\ProductCollection;
use Illuminate\Support\Arr;
use App\Http\Requests\v1\BulkStoreProductRequest;
use App\Http\Requests\v1\StoreProductRequest;
use App\Http\Requests\v1\UpdateProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return new ProductResource(Product::create($request->all()));
    }

    public function bulkStore(BulkStoreProductRequest $request){
        $bulk = collect($request->all())->map(function($arr,$key){
            return Arr::except($arr,['supplierId']);
        });

        Product::insert($bulk->toArray());
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        $product->delete();
        return response()->json([
            'message' => 'Product deleted successfully'
        ]);
    }
}
