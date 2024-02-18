@extends('user.layouts.index')
@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-xl-10">
            <div class="row border-bottom border-2 border-primary">
                <div class="col-lg-8 col-md-7 col-sm-6 col-6 d-none d-sm-block">
                    <div class="text-start py-3 fs-4 fw-bold card-title">{{ __('My Uploaded Applications') }}
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-5 col-sm-6 col-12 py-3">
                    <form action="{{ route('job.apply.search') }}" method="GET" role="search" class="d-flex">
                        @csrf
                        <input class="form-control me-2 " type="search" name="search" placeholder="Search Job role" aria-label="Search">
                        <button class="btn btn-primary" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div> --}}
            </div>
            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <i class="fa-solid fa-check me-2"></i>
                                <strong>{{ $message }}</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
            @if($applicant->count())
            <div class="card mt-3 shadow rounded-5">
                <div class="card-body">
                    @if (session('msg'))
                        <div class="col-lg-12 py-1">
                            <h1 class="text-center justify-content-center">
                                <i class="fa-solid display-1 text-info fa-circle-exclamation"></i>
                            </h1>
                            <div class="card-body">
                                <p class="h2 fw-bold text-danger text-center">{{ __('ERROR 404 | Not Found!') }}</p>
                                <h5 class="card-title fw-bold text-center">{{ session('msg') }}</h5>
                                <p class="card-text fw-bold text-center text-muted">{{ __('Sorry, but the query you were looking for was either not found or does not exist.') }}</p>
                                <div class="row justify-content-center">
                                    <div class="col-xl-6 col-lg-10 col-md-10 col-sm-10 col-12">
                                        <div class="row">
                                            <form action="{{ route('admin.subject.search')}}" method="GET" role="search" class="d-flex">
                                                @csrf
                                                <div class="input-group">
                                                    <input class="form-control me-2 border border-warning" type="search" name="search" placeholder="Please try again to search by Teachers Name, Subject Code, Year or Section" aria-label="Search">
                                                    <div class="input-group-text bg-warning">
                                                        <button class="btn " type="submit"><i class="fa-solid fa-magnifying-glass text-white"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <table class="table">
                        <thead class="table-light text-center">
                            <tr>
                                <td>Job Role</td>
                                <td>Applicants Name</td>
                                <td>Application Status</td>
                                {{-- <td>Resume</td> --}}
                                <td>Date Applied</td>
                                <td>Actions</td>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-primary text-opacity-75 py-5">
                            @foreach ( $applicant as $applicants )
                            <tr>
                                <td class="text-center"><a href="" class="text-decoration-none text-dark">{{ $applicants->jobs->job_title }}</a></td>
                                <td class="text-center">{{ $applicants->user->name }}</td>
                                @if ($applicants->deleted_at)
                                    <td class="text-success text-center">{{ __('Approved') }}</td>
                                @else
                                    <td class="text-warning text-center">{{ __('Pending') }}</td>
                                @endif
                                <td class="text-center">{{ $applicants->created_at->toDayDateTimeString() }}</td>
                                <td class="text-center">
                                    @if ($applicants->deleted_at)
                                    @else
                                    <a href="{{ route('job.apply.destroy', $applicants->id) }}" class="btn btn-secondary btn-sm" onclick="return confirm('Are you sure to withdraw your application?')"><i class="fa-solid fa-arrow-rotate-left"></i></a>
                                    @endif
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModalCenter{{ $applicants->id }}"><i class="fa-solid fa-eye"></i></button>
                                    <div class="modal fade" id="exampleModalCenter{{ $applicants->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body text-start">
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <div class="text-start mt-4">
                                                                <h2 >{{$applicants->user->name }}</h2>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="text-end">
                                                                <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle img-thumbnail  mb-3" height="100px" width="100px">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card mb-4" style="background-color: #CFD8DC">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-4 col-xl-4 col-lg-4">
                                                                    <p class="fs-6"><i class="fa-solid fa-envelope fs-6"></i><span class="px-2">{{ __('Email') }}</span></p>
                                                                </div>
                                                                <div class="col-8 col-xl-8 col-lg-8">
                                                                    <p class="fs-6 text-end fw-bolder">{{ $applicants->user->email }}</p>
                                                                </div>
                                                                <div class="col-4 col-xl-4 col-lg-4">
                                                                    <p class="fs-6"><i class="fa-solid fa-phone fs-6"></i><span class="px-2">{{ __('Phone Number') }}</span></p>
                                                                </div>
                                                                <div class="col-8 col-xl-8 col-lg-8">
                                                                    <p class="fs-6 text-end fw-bolder">{{ __('09557815639') }}</p>
                                                                </div>
                                                                <div class="col-4 col-xl-4 col-lg-4">
                                                                    <p class="fs-6"><i class="fa-solid fa-location-dot fs-6"></i><span class="px-2">{{ __('Address') }}</span></p>
                                                                </div>
                                                                <div class="col-8 col-xl-8 col-lg-8">
                                                                    <p class="fs-6 text-end fw-bolder">{{ __('Zamboanga City') }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @if ($applicants->user->file_resume)
                                                    <div class="container text-start">
                                                        <div class="card mb-3">
                                                            <div class="card-body">
                                                                <div class="row no-gutters">
                                                                    <div class="col-lg-2 text-center">
                                                                        <i class="fa-regular text-danger fa-file-pdf display-2"></i>
                                                                        {{-- <img src="{{asset('/storage/images/avatar.png')}}" alt="avatar" class="rounded-circle img-thumbnail" height="100px" width="100px"> --}}
                                                                    </div>
                                                                    <div class="col-lg-8 mt-3">
                                                                        <p class="card-title">{{ $applicants->user->file_resume->file_resume }}</p>
                                                                        <p class="small text-muted">{{ ('Applied '.$applicants->created_at->diffForHumans()) }}</p>
                                                                    </div>
                                                                    <div class="col-lg-2 text-end">
                                                                        <a href="#" class="btn btn-outline-dark border-0 fs-5 rounded-circle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                            <i class="bi bi-three-dots-vertical fs-5"></i>
                                                                        </a>
                                                                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDarkDropdownMenuLink">
                                                                            <li><a class="dropdown-item" href="{{ route('view.pdf') }}"><i class="fa-solid fa-eye me-2"></i>{{ __('View') }}</a></li>
                                                                            <li><a class="dropdown-item" href="{{ route('download.pdf') }}"><i class="fa-solid fa-download me-2"></i>{{ __('Download') }}</a></li>
                                                                            <li><a class="dropdown-item" href="{{ route('destroy.pdf',$applicants->id) }}"><i class="fa-solid fa-trash-can me-2"></i>{{ __('Delete') }}</a></li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                <p class="mb-5">No resume</p>
                                                @endif
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                    {{ $applicant->links() }}
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
                                {{ __('No Applications yet.') }}</h5>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
