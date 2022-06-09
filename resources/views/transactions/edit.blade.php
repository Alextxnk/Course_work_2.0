@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Transaction</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Edit Transaction') }}
                        <a href="{{ route('transaction.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('transaction.update', ['id' => $transaction->transaction_id]) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')

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
                                        {{ __('Edit Transaction') }}
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
