@extends('admin.layouts.app')
@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#" class="text-decoration-none">{{ __('Admin Dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ __('Employer') }}</li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="row border-bottom border-2 border-primary">
                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('Employers Table') }}
                    </div>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                    <form action="{{ route('admin.search.employers') }}" method="GET" role="search" class="d-flex">
                        @csrf
                        <input class="form-control me-2 " type="search" name="search" placeholder="Search Company Name or Employers Name" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
            </div>
            @if($employer->count())
            <div class="card mt-3 shadow rounded-5">
                <div class="card-body">
                    @if (Session::has('success'))
                        <p>{{ Session::get('success') }}</p>
                    @endif
                    @if (session('message'))
                        <div class="col-lg-12 py-3">
                            <div class="text-center justify-content-center">
                                <i class="bi bi-exclamation-triangle-fill fs-1 text-warning text-center"></i>
                            </div>
                            <div class="card-body">
                                <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                                <h5 class="card-title fw-bold text-center">{{ session('message') }}</h5>
                                <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }} </p>
                                <div class="row justify-content-center">
                                    <div class="col-lg-5 col-md-5 col-sm-10 col-12">
                                        <div class="row">
                                            <form action="{{ route('admin.search.employers') }}" method="GET" role="search" class="d-flex">
                                                @csrf
                                                <div class="input-group">
                                                    <input class="form-control me-2 border border-warning" type="search" name="search" placeholder="Please try again to search by Name, Email and Company Name" aria-label="Search">
                                                    <div class="input-group-text bg-warning">
                                                        <button class="btn " type="submit">
                                                            <i class="fa-solid fa-magnifying-glass text-white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <table class="table text-center">
                        <thead class="table-light">
                            <tr>
                                <td>Employer Name</td>
                                <td>Email</td>
                                <td>Company Name</td>
                                <td>Phone Number</td>
                                <td>Date Joined</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-primary text-opacity-75 py-5">
                            @foreach ( $employer as $employers)
                                <tr>
                                    <td><a href="" class="text-decoration-none text-dark">{{ $employers->name }}</a></td>
                                    <td>{{ $employers->email }}</td>
                                    <td>{{ $employers->company_name }}</td>
                                    <td>{{ __('09557815639') }}</td>
                                    <td>{{ $employers->created_at->toDayDateTimeString() }}</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $employers->id }}"><i class="fa-solid fa-eye"></i></button>
                                        <div class="modal fade modal-alert" id="exampleModalCenter{{ $employers->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog ">
                                                <div class="modal-content shadow" style="border-radius:20px; ">
                                                    <div class="modal-header flex-nowrap border-bottom-0">
                                                        <button type="button" class="btn-close"data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body p-4 text-center">
                                                        <div class="thumb-lg member-thumb ms-auto">
                                                            <img src="{{ asset('/storage/images/avatar.png') }}" class="border border-info border-5 rounded-circle img-thumbnail" alt="" height="150px"  width="150px">
                                                        </div>
                                                        <h2 class="fw-bold mb-0">{{ $employers->name }}</h2>
                                                        <p class="">{{ __('@Email ') }}<span>|</span><span><a href="#" class=" text-decoration-none">{{ $employers->email }}</a></span>
                                                        </p>
                                                        <button type="button"class="btn btn-danger col-3" data-bs-dismiss="modal" style="border-radius:20px;">{{ __('Close') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            @else
            <div class="col-lg-12 mb-3 ">
                <div class="mb-3 py-4">
                    <div class="text-center display-1">
                        <i class="fa-solid fa-users-slash display-1"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title fs-3 text-center">
                            {{ __('No Users yet.') }}</h5>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
