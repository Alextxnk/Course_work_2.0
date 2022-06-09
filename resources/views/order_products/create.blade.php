@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Order Product</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Order Product') }}
                        <a href="{{ route('order_product.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('order_product.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="product_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Product name') }}</label>

                                <div class="col-md-6">
                                    <select name="product_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Product name</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('product_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="order_quantity" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="order_quantity"
                                           value="{{ old('order_quantity') }}" required autocomplete="order_quantity" autofocus placeholder="5">

                                    @error('order_quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="order_amount" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="order_amount"
                                           value="{{ old('order_amount') }}" required autocomplete="order_amount" autofocus placeholder="12500">

                                    @error('order_amount')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Order Product') }}
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
