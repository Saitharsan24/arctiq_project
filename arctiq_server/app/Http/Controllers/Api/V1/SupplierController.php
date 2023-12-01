<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\v1\SupplierResource;
use App\Http\Resources\v1\SupplierCollection;
use App\Http\Requests\v1\StoreSupplierRequest;
use App\Http\Requests\v1\UpdateSupplierRequest;


class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->query('includeProducts')) {
            return new SupplierCollection(Supplier::with('products')->paginate(5));
        }else{
            //return new SupplierCollection(Supplier::paginate(5));
            return new SupplierCollection(Supplier::with('products')->paginate(5));    
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSupplierRequest $request)
    {
        return new SupplierResource(Supplier::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Supplier $supplier)
    {
        if (request()->query('includeProducts')) {
            return new SupplierResource($supplier->loadMissing('products'));
        }
        return new SupplierResource($supplier);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSupplierRequest $request, Supplier $supplier)
    {
        $supplier->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return response()->json([
            'message' => 'Supplier deleted successfully'
        ]);
    }
}
 