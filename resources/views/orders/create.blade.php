@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Order</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Order') }}
                        <a href="{{ route('order.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('order.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="last_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Buyer's Last Name") }}</label>

                                <div class="col-md-6">
                                    <select name="buyer_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Buyer's Last Name</option>
                                        @foreach ($buyers as $buyer)
                                            <option value="{{ $buyer->buyer_id }}">{{ $buyer->last_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="first_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Buyer's First Name") }}</label>

                                <div class="col-md-6">
                                    <select name="buyer_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Buyer's First Name</option>
                                        @foreach ($buyers as $buyer)
                                            <option value="{{ $buyer->buyer_id }}">{{ $buyer->first_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- <div class="form-group row">
                                <label for="post_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __("Employer's Post Name") }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Employer's Post Name</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->user_id }}">{{ $user->post_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('post_name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}

                            <div class="form-group row">
                                <label for="date"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Date') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="date"
                                           value="{{ old('date') }}" required autocomplete="date" autofocus placeholder="2022-04-29 08:00:00">

                                    @error('date')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control" aria-label="Default select example">
                                        <option selected>Select Status</option>
                                        <!-- <option value="Accepted">Принят</option>
                                        <option value="Canceled">Отменен</option>
                                        <option value="Completed">Завершен</option> -->
                                        <option value="Принят">Принят</option>
                                        <option value="Отменен">Отменен</option>
                                        <option value="Завершен">Завершен</option>
                                    </select>
                                    @error('status')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Order') }}
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
