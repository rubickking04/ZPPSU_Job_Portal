@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-8">
                {{-- <div class="card shadow" > --}}
                    <div class="container">
                        <div class="card-body py-5">
                            <div class="text-start">
                                {{-- <img src="{{ asset('/storage/images/avatar.png') }}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px"> --}}
                                <h2 class="text-start">{{ __('Create an Employer Account') }}</h2>
                                <div class="alert alert-primary" role="alert">{{ __('You haven\'t posted a job before, So you\'ll need to create an employer account.') }}
                                    {{-- <a href="#" class="alert-link">an example link</a> --}}
                                </div>
                            </div>
                            <form method="POST" action="{{ route('user.employer.create') }}">
                                @csrf
                                <div class="row ">
                                    <div class="form-outline text-start">
                                        <label for="company_name" class="col-form-label fs-5">{{ __('Your company\'s name') }}</label>
                                        <input type="text" id="company_name" name="company_name" class="form-control form-control-lg @error('company_name') is-invalid @enderror"  value="{{ old('company_name') }}"/>
                                        @error('company_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline text-start mt-3">
                                        <label for="number_of_employees" class="col-form-label fs-5">{{ __('Your company\'s number of employees') }}</label>
                                        <select class="form-select form-select-lg @error('number_of_employees') is-invalid @enderror" name="number_of_employees" id="number_of_employees" aria-label="Default select example">
                                            <option selected disabled>Select an option</option>
                                            <option value="1 to 49">{{ __('1 to 49') }}</option>
                                            <option value="50 to 149">{{ __('50 to 149') }}</option>
                                            <option value="150 to 249">{{ __('150 to 249') }}</option>
                                            <option value="250 to 499">{{ __('250 to 499') }}</option>
                                            <option value="500+">{{ __('500+') }}</option>
                                        </select>
                                        @error('number_of_employees')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline text-start mt-3">
                                        <label for="name" class="col-form-label fs-5">{{ __('Your first and last name') }}</label>
                                        <input type="text" id="name" name="name" placeholder="Example: Juan Dela Cruz" class="form-control form-control-lg @error('name') is-invalid @enderror"  value="{{ old('name') }}"/>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-outline text-start mt-3">
                                        <label for="phone_number" class="col-form-label fs-5">{{ __('Your phone number') }}</label>
                                        <input type="text" id="phone_number" name="phone_number" placeholder="Example: 09551396486" class="form-control form-control-lg @error('phone_number') is-invalid @enderror"  value="{{ old('phone_number') }}"/>
                                        @error('phone_number')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-outline text-start mt-4">
                                    <div class="text-end">
                                        <button type="submit" class="text-center text-white btn btn-lg btn-primary mb-3">{{ __('Save and Continue') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                {{-- </div> --}}
            </div>
        </div>
    </div>
@endsection
