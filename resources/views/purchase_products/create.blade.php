@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Purchase Product</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Purchase Product') }}
                        <a href="{{ route('purchase_product.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('purchase_product.store') }}">
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
                                <label for="purchase_quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Quantity') }}</label>

                                <div class="col-md-6">
                                    <input id="purchase_quantity" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="purchase_quantity"
                                           value="{{ old('purchase_quantity') }}" required autocomplete="purchase_quantity" autofocus placeholder="5">

                                    @error('purchase_quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Amount') }}</label>

                                <div class="col-md-6">
                                    <input id="purchase_amount" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="purchase_amount"
                                           value="{{ old('purchase_amount') }}" required autocomplete="purchase_amount" autofocus placeholder="8750">

                                    @error('purchase_amount')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Purchase Product') }}
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
