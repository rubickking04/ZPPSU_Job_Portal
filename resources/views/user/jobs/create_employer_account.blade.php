@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center py-5">
            <div class="col-xl-6">
                <div class="card shadow" >
                    <div class="container">
                        <div class="card-body py-5">
                            <div class="text-center">
                                <img src="{{ asset('/storage/images/avatar.png') }}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                                <h2 >{{ __('Job Portal - ZPPSU') }}</h2>
                            </div>
                            <form method="POST" action="{{ route('user.auth.login') }}">
                                @csrf
                                <div class="row mb-3">
                                    <div class="form-outline text-start">
                                        <label for="name" class="col-form-label">Name</label>
                                        <input type="text" id="name" placeholder="Example: rubickking04@gmail.com"
                                                name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}"/>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                    <div class="form-outline text-start ">
                                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                        <div class="input-group">
                                            <span class="input-group-text" onclick="password_show_hide();">
                                                <i class="fas fa-eye" id="show_eye"></i>
                                                <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                            </span>
                                            <input id="password" type="password" placeholder="Must be 8-20 characters long."
                                                class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}"/>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-outline text-start">
                                    <div class="text-end">
                                        <button type="submit" class="text-center text-white btn btn-primary mb-3">{{ __('Save and Continue') }}</button>
                                    </div>
                                    <div class="text-start">
                                        <a href="{{ route('user.register') }}" class="text-decoration-none w-50 d-block mx-auto btn btn-outline-primary rounded-5">{{ __('Sign Up here') }}</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
