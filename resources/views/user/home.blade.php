@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <form class="d-flex mb-3" role="search">
                <div class="input-group">
                <span class="input-group-text">What</span>
                    <input class="form-control me-2" type="search" placeholder="Job title, Company, or City" aria-label="Search">
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
    </div>
</div>
@endsection
