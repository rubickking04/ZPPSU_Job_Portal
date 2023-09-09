@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card">
                    <div class="card-body container">
                        <div class="container">
                            @if ($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show">
                                    <i class="fa-solid fa-check me-2"></i>
                                    <strong>{{ $message }}</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                    <div class="col-lg-2 text-end">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <a href="{{ route('edit.work',$work->id) }}" class="btn btn-warning border-0 fs-5" >
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="{{ route('destroy.work',$work->id) }}" class="btn btn-danger border-0 fs-5 " >
                                                    <i class="fa-solid fa-trash-can "></i>
                                                </a>
                                            </div>
                                        </div>
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
                                    <a href="{{ route('resume.builder') }}" class="mt-3 btn btn-outline-primary"><i class="fa-solid fa-plus fs-5 me-2"></i>{{ __('Add Education') }}</a>
                                </div>
                            </div>
                            <hr>
                            @foreach ( $educations as $education )
                                <div class="row">
                                    <div class="col-lg-10">
                                        <h4 class="fw-bold lh-1">{{ $education->level_of_education.' in '. $education->field_of_study }}</h4>
                                    </div>
                                    <div class="col-lg-2 text-end">
                                        <div class="row g-3">
                                            <div class="col-lg-6">
                                                <a href="{{ route('edit.education',$education->id) }}" class="btn btn-warning border-0 fs-5" >
                                                    <i class="fa-solid fa-pencil"></i>
                                                </a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a href="{{ route('delete.education',$education->id) }}" class="btn btn-danger border-0 fs-5 " >
                                                    <i class="fa-solid fa-trash-can "></i>
                                                </a>
                                            </div>
                                        </div>
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
                                                            <label for="recipient-name" class="col-form-label">{{ __('Skill name') }}</label>
                                                            <input type="text" class="form-control mb-2 @error('body') is-invalid @enderror" id="recipient-name" name="body" >
                                                            @error('body')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                            <label for="years_of_exp" class="col-form-label">{{ __('Years of Experience') }}</label>
                                                            <select id="years_of_exp" name="years_of_exp" class="form-select mb-3 @error('years_of_exp') is-invalid @enderror" aria-label="Default select example" >
                                                                <option selected disabled>{{ __('Choose one') }}</option>
                                                                <option value="{{ __('Less than 1 year') }}">{{ __('Less than 1 year') }}</option>
                                                                <option value="{{ __('1 year') }}">{{ __('1 year') }}</option>
                                                                <option value="{{ __('2 years') }}">{{ __('2 years') }}</option>
                                                                <option value="{{ __('3 years') }}">{{ __('3 years') }}</option>
                                                                <option value="{{ __('4 years') }}">{{ __('4 years') }}</option>
                                                                <option value="{{ __('5 years') }}">{{ __('5 years') }}</option>
                                                                <option value="{{ __('6 years') }}">{{ __('6 years') }}</option>
                                                                <option value="{{ __('7 years') }}">{{ __('7 years') }}</option>
                                                                <option value="{{ __('8 years') }}">{{ __('September') }}</option>
                                                                <option value="{{ __('9 years') }}">{{ __('9 years') }}</option>
                                                                <option value="{{ __('10+ years') }}">{{ __('10+ years') }}</option>
                                                            </select>
                                                            @error('years_of_exp')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
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
                                @if ($skills->count())
                                    @foreach ( $skills as $skill)
                                        <p>{{ __('• '. $skill->body . ' - ' . $skill->years_of_exp) }}</p>
                                    @endforeach
                                @else
                                    <p>Your skills will appear here</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary mt-3" type="button">{{ __('Save Resume') }}</button>
            </div>
        </div>
    </div>
@endsection
