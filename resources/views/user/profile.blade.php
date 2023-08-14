@extends('user.layouts.index')
@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-xl-5">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text-start mt-4">
                            <h2 >{{ Auth::user()->name }}</h2>
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
                                <p class="fs-6 text-end fw-bolder">{{ Auth::user()->email }}</p>
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
                <h4>{{ __('Resume') }}</h4>
                <div class="row">
                    <div class="col-lg-6">
                        <form action="#type your action here" method="POST" enctype="multipart/form-data">
                            <div id="yourBtn" class="btn btn-lg btn-outline-primary w-100" onclick="getFile()">{{ __('Upload Resume') }}</div>
                            <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" type="file" value="upload" onchange="sub(this)"/></div>
                            <input type="submit" value='submit'  class="d-none">
                        </form>
                    </div>
                    <script>
                        function getFile(){
                            document.getElementById("upfile").click();
                        }
                        function sub(obj) {
                            var file = obj.value;
                            var fileName = file.split("\\");
                            document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
                            document.myForm.submit();
                            event.preventDefault();
                        }
                    </script>
                    <div class="col-lg-6">
                        <button class="btn btn-lg btn-outline-primary w-100">{{ __('Build a Resume') }}</button>
                    </div>
                </div>
                <p class="text-muted small mt-2">{{ __('By continuing, you agree to receive job opportunities from ZPPSU Job Portal.') }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
