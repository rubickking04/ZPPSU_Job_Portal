@extends('user.layouts.index')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text-start mt-4">
                            <h2 >{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="text-end">
                            <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                        </div>
                    </div>
                </div>
                <div class="card mb-4" style="background-color: #CFD8DC">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 col-xl-4 col-lg-4">
                                <p class="fs-6"><i class="fa-solid fa-envelope fs-6"></i><span class="px-2">{{ __('Email') }}</span></p>
                            </div>
                            <div class="col-8 col-xl-8 col-lg-8">
                                <p class="fs-6 text-end fw-bolder">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="col-4 col-xl-4 col-lg-4">
                                <p class="fs-6"><i class="fa-solid fa-phone fs-6"></i><span class="px-2">{{ __('Phone Number') }}</span></p>
                            </div>
                            <div class="col-8 col-xl-8 col-lg-8">
                                <p class="fs-6 text-end fw-bolder">{{ __('09557815639') }}</p>
                            </div>
                            <div class="col-4 col-xl-4 col-lg-4">
                                <p class="fs-6"><i class="fa-solid fa-location-dot fs-6"></i><span class="px-2">{{ __('Address') }}</span></p>
                            </div>
                            <div class="col-8 col-xl-8 col-lg-8">
                                <p class="fs-6 text-end fw-bolder">{{ __('Zamboanga City') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <h4>{{ __('Resume') }}</h4>
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-check me-2"></i>
                            <strong>{{ $message }}</strong>
                        </div>
                        @endif
                        <form class="mb-4" action="{{ route('file-upload') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                            <div class="mb-3">
                                <input type="file" class="form-control filepond" id="recipient-name" name="file-resume">
                            </div>
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        <button class="btn btn-lg btn-danger w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" type="submit">{{ __('Upload Resume') }}</button>
                    </form>
                    </div>
                    <div class="col-lg-5">
                        <hr>
                    </div>
                    <div class="col-lg-1">
                        <p>{{ __('or ') }}</p>
                    </div>
                    <div class="col-lg-5">
                        <hr>
                    </div>
                    <div class="col-lg-12">
                        <button class="btn btn-lg btn-outline-danger w-100">{{ __('Build a Resume') }}</button>
                    </div>
                </div>
                <p class="text-muted small mt-2">{{ __('By continuing, you agree to receive job opportunities from ZPPSU Job Portal.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
