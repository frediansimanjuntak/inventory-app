@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Products</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-end">
                                <a href="{{route('products.create')}}" class="btn btn-sm btn-primary">Add Product</a>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Barcode</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Location</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($products) <= 0)
                                        <tr>
                                            <td colspan="3">Data Empty</td>
                                        </tr>
                                    @else
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$product->name}}</td>
                                                <td>{{$product->barcode}}</td>
                                                <td>{{$product->stock}}</td>
                                                <td>{{$product->product_category ? $product->product_category->name : '-'}}</td>
                                                <td>{{$product->product_location ? $product->product_location->name : '-'}}</td>
                                                <td>
                                                    <a href="{{route('products.edit', $product)}}" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="#" onclick="event.preventDefault();
                                                    document.getElementById('delete-product-category-form__{{$product->id}}').submit();" class="btn btn-sm btn-danger">Delete</a>
                                                    <form id="delete-product-category-form__{{$product->id}}" action="{{ route('products.destroy', $product) }}" method="POST" class="d-none">
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
