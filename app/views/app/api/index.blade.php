@extends('layouts.app.main') <!-- Asosiy layoutni chaqirish -->

@section('content')
    <div class="content">

        <div class="container-fluid">
            <h3 class="fs-7">API Kalitlari</h3>
            <p class="text-body-tertiary">
                Tashqi integratsiyalar uchun API kalitlaringizni boshqaring.
            </p>

            <!-- Yangi API kalit yaratish tugmasi -->
            <div class="position-absolute end-5 top-0">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createApiKeyModal">
                    <i class="fa-solid fa-plus d-inline d-md-none"></i>
                    <span class="d-none d-md-inline">Kalit yaratish</span>
                </button>
            </div>
        </div>

        <!-- API kalitlar ro‘yxati -->
        <div class="container-fluid mt-5">
            <div class="card d-grid" style="min-height: calc(100vh - 240px)">
                @if($apiKeys->count())
                    <!-- Agar API kalitlar bo‘lsa, ro‘yxatni ko‘rsatish -->
                    <div class="card-body">
                        @include('app.api.partials.list')
                    </div>
                @else
                    <!-- Agar API kalitlar mavjud bo‘lmasa, foydalanuvchiga bildirish -->
                    <div class="d-flex justify-content-center align-items-center">
                        @include('components.empty', [
                            'title' => 'Hali API kalitlar mavjud emas',
                            'message' => 'Tashqi xizmatlar bilan integratsiya qilish uchun API kalit yarating.'
                        ])
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Faqat admin foydalanuvchilar API kalit qo‘shishi mumkin -->
    @if(SurveyrConfig('api.enabled') && $loggedUser->role == 'admin')
        @include('app.api.partials.add')
    @endif
@endsection
