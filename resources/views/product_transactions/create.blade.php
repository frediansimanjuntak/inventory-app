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
                <div class="card-header">Create Product Transaction</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{route('product_transactions.store')}}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="product_id">Product</label>
                            <select name="product_id" class="form-control">
                                <option>-- Choose Product --</option>
                                @if (isset($products))
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}">{{$product->name}}</option>                                              
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
                            <label for="stock">Stock</label>
                            <input type="text" name="stock" class="form-control  @error('stock') is-invalid @enderror" value="{{old('stock')}}">
                            @error('stock')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control">
                                <option value="in" {{old('product_category_id') == 'in' ? 'selected' : ''}}>IN</option>
                                <option value="out" {{old('product_category_id') == 'out' ? 'selected' : ''}}>OUT</option>
                            </select>

                            @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="remark">Remarks</label>
                            <input type="text" name="remark" class="form-control  @error('remark') is-invalid @enderror" value="{{old('remark')}}">
                            @error('remark')
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
