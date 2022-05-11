@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Product Locations</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-end">
                                <a href="{{route('product_locations.create')}}" class="btn btn-sm btn-primary">Add Product Location</a>
                            </div>
                        </div>
                        <div class="col-md-12 mt-2">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($productLocations) <= 0)
                                        <tr>
                                            <td colspan="3">Data Empty</td>
                                        </tr>
                                    @else
                                        @foreach ($productLocations as $productLocation)
                                            <tr>
                                                <td>{{$loop->index + 1}}</td>
                                                <td>{{$productLocation->name}}</td>
                                                <td>{{$productLocation->description}}</td>
                                                <td>
                                                    <a href="{{route('product_locations.edit', $productLocation)}}" class="btn btn-sm btn-success">Edit</a>
                                                    <a href="#" onclick="event.preventDefault();
                                                    document.getElementById('delete-product-category-form__{{$productLocation->id}}').submit();" class="btn btn-sm btn-danger">Delete</a>
                                                    <form id="delete-product-category-form__{{$productLocation->id}}" action="{{ route('product_locations.destroy', $productLocation) }}" method="POST" class="d-none">
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
