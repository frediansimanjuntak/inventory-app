<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductTransactionRequest;
use App\Http\Requests\UpdateProductTransactionRequest;
use App\Models\ProductTransaction;
use App\Models\Product;

class ProductTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTransactions = ProductTransaction::all();
        return view('product_transactions.index', compact('productTransactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('product_transactions.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function show(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductTransactionRequest  $request
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductTransactionRequest $request, ProductTransaction $productTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductTransaction  $productTransaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductTransaction $productTransaction)
    {
        //
    }
}
