@extends('employer.layouts.app')
@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <a href="" class="card text-decoration-none mb-3 rounded-5">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <h4>Fullstack Dev</h4>
                            </div>
                            {{-- <div class="col-lg-4 text-end">
                                <i class="bi bi-three-dots-vertical fs-5"></i>
                            </div> --}}
                        </div>
                        <p class="text-muted lh-1">Dreame.rs IT Solutions Inc.</p>
                        <div class="text-muted lh-1 mb-2">
                            <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                            <span class="">Zamboanga City</span>
                        </div>
                        <button class="btn btn-secondary btn-sm">PHP 30,0000 a month</button>
                        <button class="btn btn-secondary btn-sm">Fulltime</button>
                        <button class="btn btn-secondary btn-sm">Onsite</button>
                        <p class="text-muted small mt-1 lh-sm">{{ __('1 min ago •') }}
                            <i class="fa-solid fa-earth-asia me-1"></i>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
