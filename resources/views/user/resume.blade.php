@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                {{-- <h4>{{ __('Build your own resume here.') }}</h4> --}}
                <h3>{{ __('Add your Education.') }}</h3>
                <form action="{{ route('add.education') }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3 mt-4">
                        <div class="form-outline mb-2 text-start">
                            <label for="level_of_education" class="col-form-label">{{ __('Level of Education') }}</label>
                            <input type="text" id="level_of_education" placeholder="Bachelor Degree" name="level_of_education" class="form-control form-control-lg @error('level_of_education') is-invalid @enderror"  value="{{ old('level_of_education') }}"/>
                            @error('level_of_education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="field_of_study" class="col-form-label">{{ __('Field of study') }}</label>
                            <input type="text" id="field_of_study" placeholder="" name="field_of_study" class="form-control form-control-lg @error('field_of_study') is-invalid @enderror"  value="{{ old('field_of_study') }}"/>
                            @error('field_of_study')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="school_name" class="col-form-label">{{ __('School Name') }}</label>
                            <input type="text" id="school_name" placeholder="Zamboanga Peninsula Polytechnic State University" name="school_name" class="form-control form-control-lg @error('school_name') is-invalid @enderror"  value="{{ old('school_name') }}"/>
                            @error('school_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="start_date" class="col-form-label">{{ __('From') }}</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select id="job_type" name="job_type" class="form-select form-select-lg @error('job_type') is-invalid @enderror" aria-label="Default select example" value="{{ old('job_type') }}">
                                        <option selected disabled>Month</option>
                                        <option value="{{ __('January') }}">{{ __('January') }}</option>
                                        <option value="{{ __('February') }}">{{ __('February') }}</option>
                                        <option value="{{ __('March') }}">{{ __('March') }}</option>
                                        <option value="{{ __('April') }}">{{ __('April') }}</option>
                                        <option value="{{ __('May') }}">{{ __('May') }}</option>
                                        <option value="{{ __('June') }}">{{ __('June') }}</option>
                                        <option value="{{ __('July') }}">{{ __('July') }}</option>
                                        <option value="{{ __('August') }}">{{ __('August') }}</option>
                                        <option value="{{ __('September') }}">{{ __('September') }}</option>
                                        <option value="{{ __('October') }}">{{ __('October') }}</option>
                                        <option value="{{ __('November') }}">{{ __('November') }}</option>
                                        <option value="{{ __('December') }}">{{ __('December') }}</option>
                                    </select>

                                </div>
                                <div class="col-lg-6">
                                    <input type="month" id="start_date" placeholder="College" name="start_date" class="form-control form-control-lg @error('start_date') is-invalid @enderror"  value="{{ old('start_date') }}"/>

                                </div>
                            </div>
                            @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 col-lg-6 text-start">
                            <label for="end_date" class="col-form-label">{{ __('To') }}</label>
                            <input type="month" id="date" name="end_date" class="form-control form-control-lg @error('end_date') is-invalid @enderror"  value="{{ old('end_date') }}"/>
                            @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-start mt-3">
                            <button type="submit" class="text-center text-white btn btn-primary mb-3">{{ __('Save and Continue')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
