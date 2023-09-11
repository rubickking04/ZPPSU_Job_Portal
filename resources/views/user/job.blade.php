@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-xl-6">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8">
                            <h4>{{ $title }}</h4>
                        </div>
                        {{-- <div class="col-lg-4 text-end">
                            <i class="bi bi-three-dots-vertical fs-5"></i>
                        </div> --}}
                    </div>
                    <p class="text-muted lh-1">{{ $comp_name }}</p>
                    <div class="text-muted lh-1 mb-2">
                        <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                        <span class="">{{ $location }}</span>
                    </div>
                    <button class="btn btn-secondary btn-sm">{{ 'PHP '.number_format($salary).' a month'}}</button>
                    <button class="btn btn-secondary btn-sm">{{ $type}}</button>
                    <button class="btn btn-secondary btn-sm">{{ $status }}</button>
                    <p class="text-muted small mt-1 lh-sm">{{ $date->diffForHumans().' •' }}
                        <i class="fa-solid fa-earth-asia me-1"></i>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
