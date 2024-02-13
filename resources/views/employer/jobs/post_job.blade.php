@extends('employer.layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                <div class="card-body">
                    <h2>{{ __('Post a Job') }}</h2>
                    <form method="POST" action="{{ route('post.job') }}">
                        @csrf
                        <div class="row mb-3">
                            <input type="hidden" name="user_id">
                            <div class="form-outline text-start mb-2">
                                <label for="job_title" class="col-form-label fs-4">{{ __('Job Title') }}</label>
                                <input type="text" id="job_title" placeholder="Fullstack Dev" name="job_title" class="form-control @error('job_title') is-invalid @enderror"  value="{{ old('job_title') }}"/>
                                @error('job_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_location" class="col-form-label fs-4">{{ __('Job Location') }}</label>
                                <input type="text" id="job_location" placeholder="Zamboanga City" name="job_location" class="form-control @error('job_location') is-invalid @enderror"  value="{{ old('job_location') }}"/>
                                @error('job_location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_type" class="col-form-label fs-4">{{ __('Job Type') }}</label>
                                <select id="job_type" name="job_type" class="form-select @error('job_type') is-invalid @enderror" aria-label="Default select example" value="{{ old('job_type') }}">
                                    <option selected disabled>Please select one</option>
                                    <option value="{{ __('Full-time') }}">{{ __('Full-time') }}</option>
                                    <option value="{{ __('Part-time') }}">{{ __('Part-time') }}</option>
                                </select>
                                @error('job_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_salary" class="col-form-label fs-4">{{ __('Job Salary') }}</label>
                                <input type="number" id="job_salary" placeholder="PHP 20,000" name="job_salary" class="form-control @error('job_salary') is-invalid @enderror"  value="{{ old('job_salary') }}"/>
                                @error('job_salary')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_status" class="col-form-label fs-4">{{ __('Job Status') }}</label>
                                <select id="job_status" name="job_status" class="form-select @error('job_status') is-invalid @enderror" aria-label="Default select example" value="{{ old('job_status') }}">
                                    <option selected disabled>Please select one</option>
                                    <option value="{{ __('Remote') }}">{{ __('Remote') }}</option>
                                    <option value="{{ __('Onsite') }}">{{ __('Onsite') }}</option>
                                </select>
                                @error('job_status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_end_date" class="col-form-label fs-4">{{ __('Job End Date') }}</label>
                                <input type="date" id="job_end_date" placeholder="Zamboanga City" name="job_end_date" class="form-control @error('job_end_date') is-invalid @enderror"  value="{{ old('job_end_date') }}"/>
                                @error('job_end_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2 col-lg-6">
                                <label for="job_vacancy" class="col-form-label fs-4">{{ __('Job Vacancy') }}</label>
                                <input type="number" id="job_vacancy" placeholder="2" name="job_vacancy" class="form-control @error('job_vacancy') is-invalid @enderror"  value="{{ old('job_vacancy') }}"/>
                                @error('job_vacancy')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-outline text-start mb-2">
                                <label for="job_description" class="col-form-label fs-4">{{ __('Job Description') }}</label>
                                <textarea type="text" id="editor" placeholder="Write job description here" rows="7" name="job_description" class="form-control  @error('job_description') is-invalid @enderror"  value="{{ old('job_description') }}"></textarea>
                                @error('job_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-outline text-start">
                            <div class="text-end">
                                <button type="submit" class="text-center text-white btn btn-danger mb-3">{{ __('Save and Continue') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
