@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Product</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Product') }}
                        <a href="{{ route('product.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('product.update', ['id' => $product->product_id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="product_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Product Name') }}</label>

                                <div class="col-md-6">
                                    <input id="product_name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="product_name"
                                           value="{{ old('product_name', $product->product_name) }}" required
                                           autocomplete="product_name" autofocus>

                                    @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="quantity" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="quantity"
                                           value="{{ old('quantity', $product->quantity) }}" required
                                           autocomplete="quantity" autofocus>

                                    @error('quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_price"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Purchase price') }}</label>

                                <div class="col-md-6">
                                    <input id="purchase_price" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="purchase_price"
                                           value="{{ old('purchase_price', $product->purchase_price) }}" required
                                           autocomplete="purchase_price" autofocus>

                                    @error('purchase_price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="selling_price"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Selling price') }}</label>

                                <div class="col-md-6">
                                    <input id="selling_price" type="text" class="form-control @error('selling_price') is-invalid @enderror"
                                           name="selling_price" value="{{ old('selling_price', $product->selling_price) }}">

                                    @error('selling_price')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Edit Product') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
