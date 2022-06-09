@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Transaction</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Transaction') }}
                        <a href="{{ route('transaction.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('transaction.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="order_quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Order quantity") }}</label>

                                <div class="col-md-6">
                                    <select name="order_product_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Order quantity</option>
                                        @foreach ($order_products as $order_product)
                                            <option value="{{ $order_product->order_product_id }}">{{ $order_product->order_quantity }}</option>
                                        @endforeach
                                    </select>
                                    @error('order_quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="order_quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Order amount") }}</label>

                                <div class="col-md-6">
                                    <select name="order_amount" class="form-control" aria-label="Default select example">
                                        <option selected>Select Order amount</option>
                                        @foreach ($order_products as $order_product)
                                            <option value="{{ $order_product->order_product_id }}">{{ $order_product->order_amount }}</option>
                                        @endforeach
                                    </select>
                                    @error('order_amount')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_quantity"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Purchase quantity") }}</label>

                                <div class="col-md-6">
                                    <select name="purchase_product_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Purchase quantity</option>
                                        @foreach ($purchase_products as $purchase_product)
                                            <option value="{{ $purchase_product->purchase_product_id }}">{{ $purchase_product->purchase_quantity }}</option>
                                        @endforeach
                                    </select>
                                    @error('purchase_quantity')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="purchase_amount"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Purchase amount") }}</label>

                                <div class="col-md-6">
                                    <select name="purchase_product_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Purchase amount</option>
                                        @foreach ($purchase_products as $purchase_product)
                                            <option value="{{ $purchase_product->purchase_product_id }}">{{ $purchase_product->purchase_amount }}</option>
                                        @endforeach
                                    </select>
                                    @error('purchase_amount')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="appointment"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Appointment') }}</label>

                                <div class="col-md-6">
                                    <select name="appointment" class="form-control" aria-label="Default select example">
                                        <option selected>Select Appointment</option>
                                        <option value="Закупка и Заказ товара">Закупка и Заказ товара</option>
                                        <option value="Закупка товара">Закупка товара</option>
                                        <option value="Заказ товара">Заказ товара</option>
                                    </select>
                                    @error('appointment')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Transaction') }}
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
