@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Transactions</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-end">
                                <a href="{{route('product_transactions.create')}}" class="btn btn-sm btn-primary">Add Product Transaction</a>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Product Name</th>
                                        <th>Barcode</th>
                                        <th>Type</th>
                                        <th>Stock</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($productTransactions) <= 0)
                                        <tr>
                                            <td colspan="3">Data Empty</td>
                                        </tr>
                                    @else
                                        @foreach ($productTransactions as $productTransaction)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$productTransaction->product->name}}</td>
                                                <td>{{$productTransaction->product->barcode}}</td>
                                                <td>{{$productTransaction->type}}</td>
                                                <td>{{$productTransaction->stock}}</td>
                                                <td>
                                                    <a href="{{route('product_transactions.edit', $productTransaction)}}" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="#" onclick="event.preventDefault();
                                                    document.getElementById('delete-product-category-form__{{$productTransaction->id}}').submit();" class="btn btn-sm btn-danger">Delete</a>
                                                    <form id="delete-product-category-form__{{$productTransaction->id}}" action="{{ route('product_transactions.destroy', $productTransaction) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method("DELETE")
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach                                        
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
