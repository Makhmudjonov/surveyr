@extends('layouts.auth.main')
@section('content')
    <div class="card">
    <main class="main" id="top">
        <div class="container">
            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                    <div class="card">
                        <div class="card-body">

                            <a class="d-flex flex-center text-decoration-none" href="/">
                                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                                    <img src="/assets/images/brand/logo-dark.png" alt="dastur logosi" height="40" /><br>
                                </div>
                            </a>

                            
                            <p class="fs-9 text-center">
                                <strong>Ikki faktorli autentifikatsiya</strong><br>
                                Email manzilingizga yuborilgan kodni kiriting
                            </p>

                            <form action="@route('2fa')" id="2faForm" class="p-2" onsubmit="submitForm(event)">
                                @csrf

                                <div class="mb-3 form-group">
                                    <input name="code" class="form-control text-center" type="text" id="code" placeholder="123456" required>
                                </div>

                                <div class="mb-3 row">
                                    <div class="col">
                                        <button class="btn btn-primary w-100 fs-9" id="btn2fa" type="submit"> Kirishni tasdiqlash </button>
                                    </div>
                                    <div class="col">
                                        <button class="btn btn-light w-100 fs-9" id="resendTimer" data-resend-time="{{$timer}}" readonly disabled> Kodni qayta yuborish </button>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <a href="@route('logout')" class="btn btn-danger w-100"> Chiqish </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@script('auth.scripts.2fa')
