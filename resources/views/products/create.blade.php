@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            @if($errors->any())
                <div class="alert alert-danger">
                    <p><strong>Opps Something went wrong</strong></p>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Product</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('products.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" value="{{old('name')}}">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="barcode">Barcode</label>
                            <input type="text" name="barcode" class="form-control  @error('barcode') is-invalid @enderror" value="{{old('barcode')}}">
                            @error('barcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <label for="description">Description</label>
                            <input type="text" name="description" class="form-control  @error('description') is-invalid @enderror" value="{{old('description')}}">
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stock">Current Stock</label>
                            <input type="text" name="stock" class="form-control  @error('stock') is-invalid @enderror" value="{{old('stock')}}">
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_category_id">Category</label>
                            <select name="product_category_id" class="form-control">
                                <option>-- Choose Cagegory --</option>
                                @if (isset($productCategories))
                                    @foreach ($productCategories as $productCategory)
                                        <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>                                              
                                    @endforeach                          
                                @endif
                            </select>

                            @error('product_category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="product_location_id">Location</label>
                            <select name="product_location_id" class="form-control">
                                <option>-- Choose Location --</option>
                                @if (isset($productLocations))
                                    @foreach ($productLocations as $productLocation)
                                        <option value="{{$productLocation->id}}">{{$productLocation->name}}</option>                                        
                                    @endforeach                             
                                @endif
                            </select>

                            @error('product_location_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2 text-end">
                            <button type="submit" class="btn btn-sm btn-primary">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
