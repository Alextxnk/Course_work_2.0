@extends('layouts.main')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Create Post</h1>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{ __('Create Post') }}
                        <a href="{{ route('post.index') }}" class="float-right">Back</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('post.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="post_name"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Post Name') }}</label>

                                <div class="col-md-6">
                                    <select name="user_id" class="form-control" aria-label="Default select example">
                                        <option selected>Select Post Name</option>
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
                            </div>

                            <div class="form-group row">
                                <label for="salary"
                                       class="col-md-4 col-form-label text-md-right">{{ __('Salary') }}</label>

                                <div class="col-md-6">
                                    <input id="salary" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="salary"
                                           value="{{ old('salary') }}" required autocomplete="salary" autofocus placeholder="40000">

                                    @error('salary')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-outline-primary">
                                        {{ __('Create Post') }}
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
