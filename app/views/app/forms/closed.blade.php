@extends('layouts.error')
@section('content')
    <main class="main" id="top">
        <div class="px-3">
            <div class="row min-vh-100 flex-center p-5">
                <div class="col-12 col-xl-10 col-xxl-8">
                    <div class="row justify-content-center align-items-center g-5">
                        <div class="col-12 col-lg-6 text-center order-lg-1">                            
                            <img class="img-fluid w-lg-100 d-dark-none" src="/assets/images/vector/teapot.svg" alt="418 xatolik" width="400" />
                            <img class="img-fluid w-md-50 w-lg-100 d-light-none" src="/assets/images/vector/teapot.svg" alt="418 xatolik" width="540" />
                        </div>
                        <div class="col-12 col-lg-6 text-center text-lg-start">
                            <div class="error-container mb-1 w-50 w-lg-75 d-none d-lg-block">
                                <span class="shadow">418</span>
                                <span class="main">418</span>
                            </div>
                            <h2 class="text-body-secondary fw-bolder mb-3">Shakl hali ochilmagan</h2>
                            <p class="text-body mb-5">                                
                                Men choynak yordamida qahva tayyorlashga harakat qilishdan bosh tortaman.
                                <br class="d-none d-sm-block" /> Yoki shunday deymizmi? Aslida server hozircha ushbu shaklni qabul qilmaydi, chunki u hali ochilmagan.
                            </p>
                            @if(auth()->id())
                                <a class="btn btn-lg btn-primary" href="@route('forms.preview', $formId)">Shaklni ko‘rib chiqish</a>
                            @else
                                <a class="btn btn-lg btn-primary" href="@route('app.home')">Bosh sahifaga qaytish</a>
                            @endif  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
