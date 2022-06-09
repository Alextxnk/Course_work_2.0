@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Employee</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Employee') }}
                        <a href="{{ route('employee.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('employee.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="username"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Username</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->user_id }}">{{ $user->username }}</option>
                                        @endforeach
                                    </select>
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="address"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <input id="address" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="address"
                                           value="{{ old('address') }}" required autocomplete="address" autofocus placeholder="Rostov-on-Don,Voroshilovsky av.,101">

                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="birthdate"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Birth date') }}</label>

                                <div class="col-md-6">
                                    <input id="birthdate" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="birthdate"
                                           value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus placeholder="2001-01-15 08:00:00">

                                    @error('birthdate')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="date_hired"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Date hired') }}</label>

                                <div class="col-md-6">
                                    <input id="date_hired" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="date_hired"
                                           value="{{ old('date_hired') }}" required autocomplete="date_hired" autofocus placeholder="2022-04-29 08:00:00">

                                    @error('date_hired')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Employee') }}
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
