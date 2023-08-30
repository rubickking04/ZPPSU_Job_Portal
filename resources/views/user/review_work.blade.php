@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <h3>{{ __('Review your Work.') }}</h3>
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <i class="fa-solid fa-check me-2"></i>
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
                @foreach ( $works as $work )
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-10">
                                <h4>{{ $work->job_title }}</h4>
                            </div>
                            <div class="col-lg-2 text-end">
                                <a href="#" class="btn btn-outline-dark border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-three-dots-vertical fs-5"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-rotate-left me-2"></i>{{ __('Edit') }}</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="fa-solid fa-trash-can me-2"></i>{{ __('Delete') }}</a></li>
                                </ul>
                            </div>
                        </div>
                        <p class="text-muted lh-1">{{ $work->company_name }}</p>
                        <p class="text-muted lh-1">{{ $work->start_month. ' ' .$work->start_year . ' to ' . $work->end_month . ' '. $work->end_year }}</p>
                    </div>
                </div>
                @endforeach
                <div class="mt-3">
                    <a href="{{ route('resume.work') }}" class="btn btn-outline-primary btn-lg"><i class="fa-solid fa-plus fs-5 me-2"></i>{{ __('Add Another') }}</a>
                </div>
                <div class="mt-3">
                    <a href="{{ route('review.resume') }}"  class="btn btn-primary ">{{ __('Save and Continue') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
