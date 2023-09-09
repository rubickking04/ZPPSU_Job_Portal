<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>My Resume</title>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <style>
            body {
                font-family: 'Roboto', sans-serif;
            }
        </style>
    </head>
    <body>
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
    </body>
</html>
