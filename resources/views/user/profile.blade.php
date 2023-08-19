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
                <div class="row">
                    <div class="col-lg-6">
                        <button class="btn btn-lg btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#exampleModal" type="button">{{ __('Upload Resume') }}</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form>
                                            <div class="mb-3">
                                                <label for="recipient-name" class="col-form-label">Recipient:</label>
                                                <input type="file" class="form-control" id="recipient-name">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <button class="btn btn-lg btn-outline-primary w-100">{{ __('Build a Resume') }}</button>
                    </div>
                </div>
                <p class="text-muted small mt-2">{{ __('By continuing, you agree to receive job opportunities from ZPPSU Job Portal.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
