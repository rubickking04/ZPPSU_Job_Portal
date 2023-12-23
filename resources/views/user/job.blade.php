@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fa-solid fa-check me-2"></i>
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    <div class="row">
                        <div class="col-lg-8">
                            <h3>{{ $title }}</h3>
                        </div>
                    </div>
                    <p class="text-muted lh-1">{{ $comp_name }}</p>
                    <div class="text-muted lh-1 mb-2">
                        <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                        <span class="">{{ $location }}</span>
                    </div>
                    <button class="btn btn-secondary btn-sm">{{ 'PHP '.number_format($salary).' a month'}}</button>
                    <p class="text-muted small mt-1 lh-sm">{{ $date->diffForHumans().' •' }}
                        <i class="fa-solid fa-earth-asia me-1"></i>
                    </p>
                </div>
                <div class="card-body">
                    <h4>{{ __('Job Details') }}</h4>
                    <p class="text-muted small mb-3">{{ __('Here are some details aligned with this job.') }}</p>
                    <div class="card-title">
                        <i class="fa-solid fa-money-bills me-2 text-muted fs-5"></i>
                        <span class="">{{ __('Salary') }}</span>
                    </div>
                    <button class="btn btn-secondary btn-sm mx-4">{{ 'PHP '.number_format($salary).' a month'}}</button>
                    <div class="card-title mt-4">
                        <i class="fa-solid fa-briefcase me-2 text-muted fs-5"></i>
                        <span class="">{{ __('Job Type') }}</span>
                    </div>
                    <button class="btn btn-secondary btn-sm ms-4">{{ $type }}</button>
                    <button class="btn btn-secondary btn-sm ms-2">{{ $status }}</button>
                    <hr>
                    <h5>{{ __('Full Job Description') }}</h5>
                    <p class="mt-4">{{ $description }}</p>
                    <p>{{ $job_id }}</p>
                </div>
                <div class="card-footer">
                    <form action="{{ route('job.apply') }}" method="POST">
                        @csrf
                        <input type="hidden" name="job_id" value="{{ $job_id }}">
                        <button type="submit" class="btn btn-primary">{{ __('Apply Now') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
