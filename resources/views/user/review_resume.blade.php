@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body container">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <i class="fa-solid fa-check me-2"></i>
                                <strong>{{ $message }}</strong>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="text-start mt-4">
                                    <h1>{{ Auth::user()->name }}</h1>
                                    <p class="lh-1 text-primary">{{ Auth::user()->email }}</p>
                                    <p class="lh-1">{{ __('09557815639') }}</p>
                                    <p class="lh-1">{{ __('Zamboanga City') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mt-4 text-muted fw-bold">{{ __('Work') }}</h4>
                            </div>
                            <div class="col-lg-4 text-end">
                                <a href="{{ route('review.work') }}" class="mt-3 btn btn-outline-primary"><i class="fa-solid fa-plus fs-5 me-2"></i>{{ __('Add work') }}</a>
                            </div>
                        </div>
                        <hr>
                        @foreach ( $works as $work )
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h4 class="fw-bold lh-1">{{ $work->job_title }}</h4>
                                    </div>
                                </div>
                                <p class="text-muted lh-1">{{ $work->company_name }}</p>
                                <p class="text-muted lh-1">{{ $work->start_month. ' ' .$work->start_year . ' to ' . $work->end_month . ' '. $work->end_year }}</p>
                        @endforeach
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mt-4 text-muted fw-bold">{{ __('Education') }}</h4>
                            </div>
                            <div class="col-lg-4 text-end">
                                <a href="{{ route('review.education') }}" class="mt-3 btn btn-outline-primary"><i class="fa-solid fa-plus fs-5 me-2"></i>{{ __('Add Education') }}</a>
                            </div>
                        </div>
                        <hr>
                        @foreach ( $educations as $education )
                            <div class="row">
                                <div class="col-lg-10">
                                    <h4 class="fw-bold lh-1">{{ $education->level_of_education.' in '. $education->field_of_study }}</h4>
                                </div>
                            </div>
                            <p class="text-muted lh-1">{{ $education->school_name }}</p>
                            <p class="text-muted lh-1">{{ $education->start_month. ' ' .$education->start_year . ' to ' . $education->end_month . ' '. $education->end_year }}</p>
                        @endforeach
                        <div class="row">
                            <div class="col-lg-8">
                                <h4 class="mt-4 text-muted fw-bold">{{ __('Skills') }}</h4>
                            </div>
                            <div class="col-lg-4  text-end">
                                <button type="button" class="mt-3 btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-plus fs-5 me-2"></i>{{ __('Add skills') }}</button>
                                <!-- Modal -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">{{ __('Add your Skills') }}</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="{{ route('add.skills') }}">
                                                    @csrf
                                                    <div class="mb-3 text-start ">
                                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                        <label for="recipient-name" class="col-form-label">{{ __('Add yours') }}</label>
                                                        <input type="text" class="form-control" id="recipient-name" name="body">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="container">
                            @foreach ( $skills as $skill)
                                <p>{{ __('• '. $skill->body) }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3">{{ __('Save Resume') }}</button>
            </div>
        </div>
    </div>
@endsection
