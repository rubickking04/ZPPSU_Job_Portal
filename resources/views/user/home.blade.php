@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        @if ($post_jobs->count())
            @if (Session::has('success'))
                <p>{{ Session::get('success') }}</p>
            @endif
            @if (session('msg'))
                <div class="col-lg-12 py-3">
                    <div class="text-center justify-content-center">
                        <i class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                    </div>
                    <div class="card-body">
                        <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                        <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                        <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }}</p>
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                <div class="row">
                                    <form action="{{ route('search.job') }}" method="GET" role="search" class="d-flex">
                                        @csrf
                                        <div class="input-group">
                                            <input class="form-control me-2 border border-danger" type="search" name="search" placeholder="Please try again to search by Product or Category" aria-label="Search">
                                            <div class="input-group-text bg-danger">
                                                <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
            <div class="col-xl-6">
                <form class="d-flex mb-3" role="search" action="{{ route('search.job') }}" method="GET">
                    @csrf
                    <div class="input-group">
                    <span class="input-group-text">What</span>
                        <input class="form-control me-2" name="search" type="search" placeholder="Job title, Company, or City" aria-label="Search">
                    </div>
                    <button class="btn btn-outline-danger" type="submit">Search</button>
                </form>
                @foreach ( $post_jobs as $post_job)
                <a href="" class="card text-decoration-none mb-3 rounded-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4>{{ $post_job->job_title }}</h4>
                            </div>
                            {{-- <div class="col-lg-4 text-end">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </div> --}}
                        </div>
                        <p class="text-muted lh-1">{{ $post_job->job_title }}</p>
                        <div class="text-muted lh-1 mb-2">
                            <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                            <span class="">{{ $post_job->job_location }}</span>
                        </div>
                        <button class="btn btn-secondary btn-sm">{{ $post_job->job_title.'a month'}}</button>
                        <button class="btn btn-secondary btn-sm">{{ $post_job->job_type}}</button>
                        <button class="btn btn-secondary btn-sm">{{ $post_job->job_status }}</button>
                        <p class="text-muted small mt-1 lh-sm">{{ $post_job->created_at->diffForHumans().' •' }}
                            <i class="fa-solid fa-earth-asia me-1"></i>
                        </p>
                    </div>
                </a>
                @endforeach
            </div>
            @endif
        @else
            <h4 class="text-center mt-5 text-muted">{{ __('No products') }}</h4>
        @endif
    </div>
</div>
@endsection
