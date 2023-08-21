@extends('user.layouts.index')
@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                {{-- <h4>{{ __('Build your own resume here.') }}</h4> --}}
                <h3>{{ __('Add your Education.') }}</h3>
                <form action="{{ route('update.education',$id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <div class="row mb-3 mt-4">
                        <div class="form-outline mb-2 text-start">
                            <label for="level_of_education" class="col-form-label">{{ __('Level of Education') }}</label>
                            <input type="text" id="level_of_education" placeholder="Bachelor Degree" name="level_of_education" class="form-control form-control-lg @error('level_of_education') is-invalid @enderror"  value="{{ $level_of_educ }}"/>
                            @error('level_of_education')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="field_of_study" class="col-form-label">{{ __('Field of study') }}</label>
                            <input type="text" id="field_of_study" placeholder="" name="field_of_study" class="form-control form-control-lg @error('field_of_study') is-invalid @enderror"  value="{{ $fos }}"/>
                            @error('field_of_study')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="school_name" class="col-form-label">{{ __('School Name') }}</label>
                            <input type="text" id="school_name" placeholder="Zamboanga Peninsula Polytechnic State University" name="school_name" class="form-control form-control-lg @error('school_name') is-invalid @enderror"  value="{{ $school }}"/>
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
                                    <select id="start_month" name="start_month" class="form-select form-select-lg @error('start_month') is-invalid @enderror" aria-label="Default select example" value="{{ $sm }}">
                                        <option selected disabled>{{ $sm }}</option>
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
                                @error('start_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-lg-6">
                                    <select id="start_year" name="start_year" class="form-select form-select-lg @error('start_year') is-invalid @enderror" aria-label="Default select example" value="{{ $sy }}">
                                        <option selected disabled> {{ $sy }}</option>
                                        <option value="{{ __('2023') }}">{{ __('2023') }}</option>
                                        <option value="{{ __('2022') }}">{{ __('2022') }}</option>
                                        <option value="{{ __('2021') }}">{{ __('2021') }}</option>
                                        <option value="{{ __('2020') }}">{{ __('2020') }}</option>
                                        <option value="{{ __('2019') }}">{{ __('2019') }}</option>
                                        <option value="{{ __('2018') }}">{{ __('2018') }}</option>
                                        <option value="{{ __('2017') }}">{{ __('2017') }}</option>
                                        <option value="{{ __('2016') }}">{{ __('2016') }}</option>
                                        <option value="{{ __('2015') }}">{{ __('2015') }}</option>
                                        <option value="{{ __('2014') }}">{{ __('2014') }}</option>
                                        <option value="{{ __('2013') }}">{{ __('2013') }}</option>
                                        <option value="{{ __('2012') }}">{{ __('2012') }}</option>
                                        <option value="{{ __('2011') }}">{{ __('2011') }}</option>
                                        <option value="{{ __('2010') }}">{{ __('2010') }}</option>
                                        <option value="{{ __('2009') }}">{{ __('2009') }}</option>
                                        <option value="{{ __('2008') }}">{{ __('2008') }}</option>
                                        <option value="{{ __('2007') }}">{{ __('2007') }}</option>
                                        <option value="{{ __('2006') }}">{{ __('2006') }}</option>
                                        <option value="{{ __('2005') }}">{{ __('2005') }}</option>
                                        <option value="{{ __('2004') }}">{{ __('2004') }}</option>
                                        <option value="{{ __('2003') }}">{{ __('2003') }}</option>
                                        <option value="{{ __('2002') }}">{{ __('2002') }}</option>
                                        <option value="{{ __('2001') }}">{{ __('2001') }}</option>
                                        <option value="{{ __('2000') }}">{{ __('2000') }}</option>
                                        <option value="{{ __('1999') }}">{{ __('1999') }}</option>
                                        <option value="{{ __('1998') }}">{{ __('1998') }}</option>
                                        <option value="{{ __('1997') }}">{{ __('1997') }}</option>
                                        <option value="{{ __('1996') }}">{{ __('1996') }}</option>
                                        <option value="{{ __('1995') }}">{{ __('1995') }}</option>
                                        <option value="{{ __('1994') }}">{{ __('1994') }}</option>
                                        <option value="{{ __('1993') }}">{{ __('1993') }}</option>
                                        <option value="{{ __('1992') }}">{{ __('1992') }}</option>
                                        <option value="{{ __('1991') }}">{{ __('1991') }}</option>
                                        <option value="{{ __('1990') }}">{{ __('1990') }}</option>
                                        <option value="{{ __('1989') }}">{{ __('1989') }}</option>
                                        <option value="{{ __('1988') }}">{{ __('1988') }}</option>
                                        <option value="{{ __('1987') }}">{{ __('1987') }}</option>
                                        <option value="{{ __('1986') }}">{{ __('1986') }}</option>
                                        <option value="{{ __('1985') }}">{{ __('1985') }}</option>
                                        <option value="{{ __('1984') }}">{{ __('1984') }}</option>
                                        <option value="{{ __('1983') }}">{{ __('1983') }}</option>
                                        <option value="{{ __('1982') }}">{{ __('1982') }}</option>
                                        <option value="{{ __('1981') }}">{{ __('1981') }}</option>
                                        <option value="{{ __('1980') }}">{{ __('1980') }}</option>
                                    </select>
                                </div>
                            </div>
                            @error('start_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-outline mb-2 text-start">
                            <label for="end_month" class="col-form-label">{{ __('To: ') }}</label>
                            <div class="row">
                                <div class="col-lg-6">
                                    <select id="end_month" name="end_month" class="form-select form-select-lg @error('end_month') is-invalid @enderror" aria-label="Default select example" value="{{ $em }}">
                                        <option selected disabled>{{ $em }}</option>
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
                                @error('end_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <div class="col-lg-6">
                                    <select id="end_year" name="end_year" class="form-select form-select-lg @error('end_year') is-invalid @enderror" aria-label="Default select example" value="{{ $ey }}">
                                        <option selected disabled>{{ $ey }}</option>
                                        <option value="{{ __('2023') }}">{{ __('2023') }}</option>
                                        <option value="{{ __('2022') }}">{{ __('2022') }}</option>
                                        <option value="{{ __('2021') }}">{{ __('2021') }}</option>
                                        <option value="{{ __('2020') }}">{{ __('2020') }}</option>
                                        <option value="{{ __('2019') }}">{{ __('2019') }}</option>
                                        <option value="{{ __('2018') }}">{{ __('2018') }}</option>
                                        <option value="{{ __('2017') }}">{{ __('2017') }}</option>
                                        <option value="{{ __('2016') }}">{{ __('2016') }}</option>
                                        <option value="{{ __('2015') }}">{{ __('2015') }}</option>
                                        <option value="{{ __('2014') }}">{{ __('2014') }}</option>
                                        <option value="{{ __('2013') }}">{{ __('2013') }}</option>
                                        <option value="{{ __('2012') }}">{{ __('2012') }}</option>
                                        <option value="{{ __('2011') }}">{{ __('2011') }}</option>
                                        <option value="{{ __('2010') }}">{{ __('2010') }}</option>
                                        <option value="{{ __('2009') }}">{{ __('2009') }}</option>
                                        <option value="{{ __('2008') }}">{{ __('2008') }}</option>
                                        <option value="{{ __('2007') }}">{{ __('2007') }}</option>
                                        <option value="{{ __('2006') }}">{{ __('2006') }}</option>
                                        <option value="{{ __('2005') }}">{{ __('2005') }}</option>
                                        <option value="{{ __('2004') }}">{{ __('2004') }}</option>
                                        <option value="{{ __('2003') }}">{{ __('2003') }}</option>
                                        <option value="{{ __('2002') }}">{{ __('2002') }}</option>
                                        <option value="{{ __('2001') }}">{{ __('2001') }}</option>
                                        <option value="{{ __('2000') }}">{{ __('2000') }}</option>
                                        <option value="{{ __('1999') }}">{{ __('1999') }}</option>
                                        <option value="{{ __('1998') }}">{{ __('1998') }}</option>
                                        <option value="{{ __('1997') }}">{{ __('1997') }}</option>
                                        <option value="{{ __('1996') }}">{{ __('1996') }}</option>
                                        <option value="{{ __('1995') }}">{{ __('1995') }}</option>
                                        <option value="{{ __('1994') }}">{{ __('1994') }}</option>
                                        <option value="{{ __('1993') }}">{{ __('1993') }}</option>
                                        <option value="{{ __('1992') }}">{{ __('1992') }}</option>
                                        <option value="{{ __('1991') }}">{{ __('1991') }}</option>
                                        <option value="{{ __('1990') }}">{{ __('1990') }}</option>
                                        <option value="{{ __('1989') }}">{{ __('1989') }}</option>
                                        <option value="{{ __('1988') }}">{{ __('1988') }}</option>
                                        <option value="{{ __('1987') }}">{{ __('1987') }}</option>
                                        <option value="{{ __('1986') }}">{{ __('1986') }}</option>
                                        <option value="{{ __('1985') }}">{{ __('1985') }}</option>
                                        <option value="{{ __('1984') }}">{{ __('1984') }}</option>
                                        <option value="{{ __('1983') }}">{{ __('1983') }}</option>
                                        <option value="{{ __('1982') }}">{{ __('1982') }}</option>
                                        <option value="{{ __('1981') }}">{{ __('1981') }}</option>
                                        <option value="{{ __('1980') }}">{{ __('1980') }}</option>
                                    </select>
                                </div>
                            </div>
                            @error('end_year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="text-start mt-3">
                            <a href="{{ route('review.education') }}"class="text-center btn btn-outline-primary mb-3">{{ __('Cancel')}}</a>
                            <button type="submit" class="text-center text-white btn btn-primary mb-3">{{ __('Save and Continue')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
