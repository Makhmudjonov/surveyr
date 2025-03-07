@extends('layouts.auth.main')
@section('content')
    <main class="main" id="top">
        <div class="container">
            <div class="row flex-center min-vh-100 py-5">
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">
                    <div class="card">
                        <div class="card-body">
                            
                            <a class="d-flex flex-center text-decoration-none mb-3" href="/">
                                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">
                                    <img src="/assets/images/brand/logo-dark.png" alt="dastur logosi" height="40" />
                                </div>
                            </a>

                            <p class="fs-9 text-center">
                                <strong>Parolni tiklash</strong><br>
                                Parolingizni tiklash uchun email manzilingizni kiriting
                            </p>

                            <form action="{{ route('reset') }}" id="resetForm" class="p-2" onsubmit="submitForm(event)">
                                @csrf
                            
                                <div class="alert alert-success d-none fs-9">
                                    <strong>Muvaffaqiyatli!</strong> Parolni tiklash uchun havola emailingizga yuborildi. Spam papkasini ham tekshiring.
                                </div>
                                
                                <div class="form-group mb-3">
                                    <div class="form-icon-container">
                                        <input class="form-control form-icon-input" name="email" type="email" id="email" placeholder="johndoe@gmail.com" required>
                                        <span class="fas fa-at text-body fs-9 form-icon"></span>
                                    </div>
                                </div>

                                <button class="btn btn-primary w-100 mb-3" id="btnReset" type="submit">Parolni tiklash</button>
                            </form>

                            <div class="row flex-between-center mb-3">
                                <div class="text-center">
                                    <span class="fs-9">Parolingiz esingizdami?</span>
                                    <a class="fs-9 fw-bold" href="@route('login')">Kirish</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
