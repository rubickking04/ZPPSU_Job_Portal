@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <h3>{{ __('Review your Education.') }}</h3>
                @foreach ( $educations as $educations )
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4>{{ $educations->level_of_education.' in '. $educations->field_of_study }}</h4>
                            </div>
                            <div class="col-lg-2 text-end">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </div>
                        </div>
                        <p class="text-muted lh-1">{{ $educations->school_name }}</p>
                        <p class="text-muted lh-1">{{ $educations->start_date->format('d/m/Y'). ' to ' . $educations->end_date }}</p>
                            {{-- <div class="text-muted lh-1 mb-2">
                                <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                                <span class="">{{ $post_job->job_location }}</span>
                            </div>
                            <button class="btn btn-secondary btn-sm">{{ $post_job->job_title.'a month'}}</button>
                            <button class="btn btn-secondary btn-sm">{{ $post_job->job_type}}</button>
                            <button class="btn btn-secondary btn-sm">{{ $post_job->job_status }}</button>
                            <p class="text-muted small mt-1 lh-sm">{{ $post_job->created_at->diffForHumans().' •' }}
                                <i class="fa-solid fa-earth-asia me-1"></i>
                            </p> --}}
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
