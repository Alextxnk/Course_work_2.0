@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Purchase</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Purchase') }}
                        <a href="{{ route('purchase.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('purchase.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="provider"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Provider') }}</label>

                                <div class="col-md-6">
                                    <input id="provider" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="provider"
                                           value="{{ old('provider') }}" required autocomplete="provider" autofocus placeholder="Yandex market">

                                    @error('provider')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
                                        {{ __('Create Purchase') }}
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
