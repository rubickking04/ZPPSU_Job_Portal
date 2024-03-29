@extends('user.layouts.index')
@section('content')
    <div class="container py-2">
        <div class="row justify-content-center py-2">
            <div class="col-xl-6">
                <div class="card shadow" >
                    <div class="card-body py-5">
                        <div class="text-center">
                            <img src="{{ asset('/storage/images/avatar.png') }}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                            <h2 >{{ __('Job Seeker Portal') }}</h2>
                        </div>
                        <form method="POST" action="{{ route('user.auth.register') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="form-outline text-start">
                                    <label for="name" class="col-form-label">Name</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa-solid fa-user"></i></div>
                                        <input type="text" id="name" placeholder="Example: Juan Dela Cruz"
                                            name="name" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start">
                                    <label for="email" class="col-form-label">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="bi bi-envelope-fill"></i></div>
                                        <input type="email" id="email" placeholder="Example: admin@gmail.com"
                                            name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}"/>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6">
                                    <label for="email" class="col-form-label">ID Number or TOR</label>
                                    <div class="input-group">
                                        {{-- <div class="input-group-text"><i class="fa-solid fa-phone"></i></div> --}}
                                        <input type="number" id="id_number" placeholder="Example: 2019000000" name="id_number" class="form-control @error('id_number') is-invalid @enderror"  value="{{ old('id_number') }}"/>
                                        @error('id_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6">
                                    <label for="email" class="col-form-label">Phone Number</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa-solid fa-phone"></i></div>
                                        <input type="number" id="phone_number" placeholder="Example: 09557815639"
                                            name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"  value="{{ old('phone_number') }}"/>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start">
                                    <label for="email" class="col-form-label">Address</label>
                                    <div class="input-group">
                                        <div class="input-group-text"><i class="fa-solid fa-location-dot"></i></div>
                                        <input type="text" id="address" placeholder="Example: Boalan"
                                            name="address" class="form-control @error('address') is-invalid @enderror"  value="{{ old('address') }}"/>
                                        @error('address')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start col-lg-6">
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
                                <div class="form-outline text-start col-lg-6">
                                    <label for="confirm-password" class="col-form-label">{{ __('Confirm Password') }}</label>
                                    <div class="input-group">
                                        <span class="input-group-text" onclick="password_show_hides();">
                                            <i class="fas fa-eye" id="show_eyes"></i>
                                            <i class="fas fa-eye-slash d-none" id="hide_eyes"></i>
                                        </span>
                                        <input id="password-confirm" type="password" placeholder="Must be 8-20 characters long."
                                            class="form-control @error('password') is-invalid @enderror" name="password_confirmation" value="{{ old('password') }}"/>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="text-start">
                                    <button type="submit" class="text-center text-white btn w-75 d-block mx-auto btn-primary mb-3 rounded-5">{{ __('Sign Up') }}</button>
                                </div>
                                <div class="text-center">
                                    <p>{{ __('Already have an account? ') }}
                                        <a href="{{ route('user.login') }}" class="text-decoration-none">{{ __('Log in') }}</a>
                                    </p>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
