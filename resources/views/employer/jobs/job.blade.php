@extends('employer.layouts.app')
@section('content')
    <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-12">
                <div class="row border-bottom border-2 border-primary">
                    <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                        <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Posted Jobs') }}
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                        <form action="#" method="GET" role="search" class="d-flex">
                            @csrf
                            <input class="form-control me-2 " type="search" name="search" placeholder="Search Job role" aria-label="Search">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="card mt-3 shadow rounded-5">
                    <div class="card-body">
                        <table class="table text-center">
                            <thead class="table-light">
                                <tr>
                                    <td>Job Role</td>
                                    <td>Pending Applicants</td>
                                    <td>Approved Applicants</td>
                                    <td>Date Created</td>
                                    <td>Actions</td>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider text-primary text-opacity-75">
                                @foreach ( $jobs as $job)
                                    <tr>
                                        <td><a href="" class="text-decoration-none">{{ $job->job_title }}</a></td>
                                        <td class="text-danger">24</td>
                                        <td class="text-success">5</td>
                                        <td>{{ $job->created_at->toDayDateTimeString() }}</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal"data-bs-target="#exampleModalCenter{{ $job->id }}"><i class="fa-solid fa-eye"></i></button>
                                            <div class="modal fade modal-alert" id="exampleModalCenter{{ $job->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content shadow" style="border-radius:20px; ">
                                                        <div class="modal-header flex-nowrap border-bottom-0">
                                                            <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4 text-start">
                                                            <div class="row">
                                                                <div class="col-lg-8">
                                                                    <h3>{{ $job->job_title }}</h3>
                                                                </div>
                                                            </div>
                                                            <p class="text-muted lh-1">{{ $job->employer->company_name }}</p>
                                                            <div class="text-muted lh-1 mb-2">
                                                                <i class="fa-solid fa-location-dot fs-5 me-2 text-danger"></i>
                                                                <span class="">{{ $job->job_location }}</span>
                                                            </div>
                                                            <button class="btn btn-secondary btn-sm">{{ 'PHP '.number_format($job->job_salary).' a month'}}</button>
                                                            <hr>
                                                            <h4>{{ __('Job Details') }}</h4>
                                                            <p class="text-muted small mb-3">{{ __('Here are some details aligned with this job.') }}</p>
                                                            <div class="card-title">
                                                                <i class="fa-solid fa-money-bills me-2 text-muted fs-5"></i>
                                                                <span class="">{{ __('Salary') }}</span>
                                                            </div>
                                                            <button class="btn btn-secondary btn-sm mx-4">{{ 'PHP '.number_format($job->job_salary).' a month'}}</button>
                                                            <div class="card-title mt-4">
                                                                <i class="fa-solid fa-briefcase me-2 text-muted fs-5"></i>
                                                                <span class="">{{ __('Job Type') }}</span>
                                                            </div>
                                                            <button class="btn btn-secondary btn-sm ms-4">{{ $job->job_type }}</button>
                                                            <button class="btn btn-secondary btn-sm ms-2">{{ $job->job_status }}</button>
                                                            <hr>
                                                            <h5>{{ __('Full Job Description') }}</h5>
                                                            <p class="mt-4">{{ $job->job_description }}</p>
                                                            <div class="text-end">
                                                                <button type="button"class="btn btn-primary col-3">{{ __('View All') }}</button>
                                                                <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#updateModalCenter{{ $job->id }}"><i class="fa-solid fa-pen"></i></button>
                                            <div class="modal fade modal-alert" id="updateModalCenter{{ $job->id }}" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                                <div class="modal-dialog ">
                                                    <div class="modal-content shadow" style="border-radius:20px; ">
                                                        <div class="modal-header flex-nowrap border-bottom-0">
                                                            <h5 class="modal-title">{{ _('Update Jobs') }}</h5>
                                                            <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body p-4 text-start">
                                                            <form method="POST" action="{{ route('post.job.update',$job->id) }}">
                                                                @csrf
                                                                <div class="row mb-3">
                                                                    <input type="hidden" name="user_id">
                                                                    <div class="form-outline text-start mb-2">
                                                                        <label for="job_title" class="col-form-label fs-4">{{ __('Job Title') }}</label>
                                                                        <input type="text" id="job_title" placeholder="Fullstack Dev" name="job_title" class="form-control @error('job_title') is-invalid @enderror"  value="{{ $job->job_title }}"/>
                                                                        @error('job_title')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-outline text-start mb-2 col-lg-6">
                                                                        <label for="job_location" class="col-form-label fs-4">{{ __('Job Location') }}</label>
                                                                        <input type="text" id="job_location" placeholder="Zamboanga City" name="job_location" class="form-control @error('job_location') is-invalid @enderror"  value="{{ $job->job_location }}"/>
                                                                        @error('job_location')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-outline text-start mb-2 col-lg-6">
                                                                        <label for="job_type" class="col-form-label fs-4">{{ __('Job Type') }}</label>
                                                                        <select id="job_type" name="job_type" class="form-select @error('job_type') is-invalid @enderror" aria-label="Default select example" value="{{ $job->job_type }}">
                                                                            <option selected disabled>{{ $job->job_type }}</option>
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
                                                                        <input type="number" id="job_salary" placeholder="PHP 20,000" name="job_salary" class="form-control @error('job_salary') is-invalid @enderror"  value="{{ $job->job_salary }}"/>
                                                                        @error('job_salary')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-outline text-start mb-2 col-lg-6">
                                                                        <label for="job_status" class="col-form-label fs-4">{{ __('Job Status') }}</label>
                                                                        <select id="job_status" name="job_status" class="form-select @error('job_status') is-invalid @enderror" aria-label="Default select example" value="{{ $job->job_status }}">
                                                                            <option selected disabled value="{{ $job->job_status }}" >{{ $job->job_status }}</option>
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
                                                                        <label for="job_start_date" class="col-form-label fs-4">{{ __('Job Start Date') }}</label>
                                                                        <input type="date" id="job_start_date" placeholder="Zamboanga City" name="job_start_date" class="form-control @error('job_start_date') is-invalid @enderror"  value="{{ $job->job_start_date }}"/>
                                                                        @error('job_start_date')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-outline text-start mb-2 col-lg-6">
                                                                        <label for="job_end_date" class="col-form-label fs-4">{{ __('Job End Date') }}</label>
                                                                        <input type="date" id="job_end_date" placeholder="Zamboanga City" name="job_end_date" class="form-control @error('job_end_date') is-invalid @enderror"  value="{{ $job->job_end_date }}"/>
                                                                        @error('job_end_date')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="form-outline text-start mb-2">
                                                                        <label for="job_description" class="col-form-label fs-4">{{ __('Job Description') }}</label>
                                                                        <textarea type="text" id="job_description" placeholder="Write job description here" rows="7" name="job_description" class="form-control  @error('job_description') is-invalid @enderror">{{ $job->job_description }}</textarea>
                                                                        @error('job_description')
                                                                            <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            <div class="text-end">
                                                                    <button type="submit" class="text-center text-white btn btn-primary">{{ __('Update') }}</button>
                                                                </form>
                                                                <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal">{{ __('Close') }}</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash-can"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
