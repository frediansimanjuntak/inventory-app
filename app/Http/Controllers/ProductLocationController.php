<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductLocationRequest;
use App\Http\Requests\UpdateProductLocationRequest;
use App\Models\ProductLocation;

class ProductLocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productLocations = ProductLocation::all();
        return view('product_locations.index', compact('productLocations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_locations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductLocationRequest $request)
    {
        try {
            ProductLocation::create($request->all());
            return redirect()->route('product_locations.index')->with("status", "Product Location created successfully");
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function show(ProductLocation $productLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductLocation $productLocation)
    {
        return view('product_locations.edit', compact('productLocation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductLocationRequest  $request
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductLocationRequest $request, ProductLocation $productLocation)
    {
        $existingProductLocation = ProductLocation::whereNotIn('id', array($productLocation->id))->where('name', $request['name'])->first();
        if (isset($existingProductLocation)) {
            return back()->withInput()->withErrors("Product Location Name is exist");
        }
        try {
            $productLocation->update($request->all());
            return redirect()->route('product_locations.index')->with("status", "Product Location updated successfully");
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductLocation  $productLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductLocation $productLocation)
    {
        try {
            $productLocation->delete();
            return redirect()->route('product_locations.index')->with("status", "Product Location deleted successfully");
        } catch (\Exception $e) {
            return back()->withInput()->withErrors($e->getMessage());
        }
    }
}
