@extends('layouts.auth.main')  
@section('content')  

    <main class="main" id="top">  
        <div class="container">  
            <div class="row flex-center min-vh-100 py-5">  
                <div class="col-sm-10 col-md-8 col-lg-5 col-xl-5 col-xxl-3">  
                    <div class="card">  
                        <div class="card-body">  
                            <a class="d-flex flex-center text-decoration-none mb-4" href="/">  
                                <div class="d-flex align-items-center fw-bolder fs-3 d-inline-block">  
                                    <img src="/assets/images/brand/logo-dark.png" alt="dastur logosi" height="40" />  
                                </div>  
                            </a>  

                            <form action="@route('signup')" id="registerForm" onsubmit="submitForm(event)">  

                                @if(isset($oauthData))  
                                    <div class="alert alert-danger" role="alert">  
                                        Foydalanuvchi topilmadi, akkaunt yaratish uchun parol kiriting  
                                    </div>   
                                @endif  

                                @csrf  

                                <div class="mb-3 text-start">  
                                    <label class="form-label" for="fullname">To‘liq ismingiz</label>  
                                    <div class="form-icon-container">  
                                        <input class="form-control form-icon-input" name="fullname" id="name" type="text" placeholder="John Doe"   
                                            value="{{ !isset($oauthData) ? null : $oauthData['givenName'] .' '. $oauthData['familyName'] }}" required>  
                                        <span class="fas fa-user text-body fs-9 form-icon"></span>  
                                    </div>  
                                </div>                                  

                                <div class="mb-3 text-start">  
                                    <label class="form-label" for="email">Email manzilingiz</label>  
                                    <div class="form-icon-container">  
                                        <input class="form-control form-icon-input" name="email" id="email" type="email" placeholder="name@example.com" value="{{ $oauthData['email'] ?? null }}" required>  
                                        <span class="fas fa-at text-body fs-9 form-icon"></span>  
                                    </div>  
                                </div>  

                                <div class="mb-3 text-start">  
                                    <label class="form-label" for="password">Parol</label>  
                                    <div class="form-icon-container" data-password="data-password">  
                                        <input class="form-control form-icon-input pe-6" name="password" id="password" type="password" placeholder="Parol" data-password-input="data-password-input" required>  
                                        <span class="fas fa-key text-body fs-9 form-icon"></span>  
                                        <button class="btn px-3 py-0 h-100 position-absolute top-0 end-0 text-body-tertiary" data-password-toggle="data-password-toggle">  
                                            <span class="fa fa-eye show"></span>  
                                            <span class="fa fa-eye-slash hide"></span>  
                                        </button>  
                                    </div>  
                                </div>  

                                <div class="form-check mb-3">  
                                    <input class="form-check-input" id="termsService" type="checkbox" />  
                                    <label class="form-label fs-9 text-transform-none" for="termsService">  
                                        Men  
                                        <a href="@route('policy.terms')" target="_blank">foydalanish shartlari</a> va  
                                        <a href="@route('policy.privacy')"  target="_blank">maxfiylik siyosati</a>ga roziman  
                                    </label>  
                                </div>  

                                <button class="btn btn-primary w-100 mb-3" id="btnRegister" type="submit">Ro‘yxatdan o‘tish</button>  

                                <div class="text-center">  
                                    <a class="fs-9 fw-bold" href="@route('login')">Mavjud akkauntga kirish</a>  
                                </div>  
                            </form>  

                        </div>  
                    </div>  
                </div>  
            </div>  
        </div>  
    </main>  

@endsection  
@script('auth.scripts.auth')  
