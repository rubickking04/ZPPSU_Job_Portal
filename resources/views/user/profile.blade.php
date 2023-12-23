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
                    @if ($work->count() || $educ->count() || $skill->count())
                    <div class="container">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-lg-2 text-center">
                                        <i class="fa-regular fa-file display-4"></i>
                                    </div>
                                    <div class="col-lg-8 mt-3">
                                        <h3 class="card-title">ZPPSU Job Post Resume</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <a href="{{ route('review.resume') }}" class="btn btn-lg btn-outline-primary w-100">{{ __('View Resume') }}</a>
                    </div>
                    @elseif ($file->count())
                    <div class="container">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fa-solid fa-check me-2"></i>
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row no-gutters">
                                    <div class="col-lg-2 text-center">
                                        <i class="fa-regular text-danger fa-file-pdf display-2"></i>
                                        {{-- <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle img-thumbnail" height="100px" width="100px"> --}}
                                    </div>
                                    <div class="col-lg-8 mt-3">
                                        <p class="card-title">{{ $resume }}</p>
                                        <p class="small text-muted">{{ ('Uploaded '.$date->diffForHumans()) }}</p>
                                    </div>
                                    <div class="col-lg-2 text-end">
                                        <a href="#" class="btn btn-outline-dark border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical fs-5"></i>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li><a class="dropdown-item" href="{{ route('view.pdf') }}"><i class="fa-solid fa-eye me-2"></i>{{ __('View') }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('download.pdf') }}"><i class="fa-solid fa-download me-2"></i>{{ __('Download') }}</a></li>
                                            <li><a class="dropdown-item" href="{{ route('destroy.pdf',$id) }}"><i class="fa-solid fa-trash-can me-2"></i>{{ __('Delete') }}</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="col-lg-12">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <i class="fa-solid fa-check me-2"></i>
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            @error('file_resume')
                            <div class="alert alert-danger">
                                <i class="fa-solid fa-circle-exclamation me-2"></i>
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <form method="POST" action="{{ route('file-upload') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="mb-3">
                                    <input type="file" class="form-control filepond" id="file_resume" name="file_resume"/>
                                </div>
                                <button class="btn btn-lg btn-primary w-100 mt-3" type="submit">{{ __('Upload Resume') }}</button>
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
                            <a href="{{ route('resume.builder') }}" class="btn btn-lg btn-outline-primary w-100">{{ __('Build a Resume') }}</a>
                        </div>
                    @endif
                </div>
                <p class="text-muted small mt-2">{{ __('By continuing, you agree to receive job opportunities from ZPPSU Job Portal.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
