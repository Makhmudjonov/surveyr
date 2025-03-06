@extends('layouts.app.main')
@section('content')
    <div class="content" style="padding-bottom: 0 !important;">
        <div class="row">

            <div class="col-12 mb-4 position-relative">
                <h3 class="fs-7">Foydalanuvchilar</h3>
                <p class="text-body-tertiary">
                    Foydalanuvchilar va ularning rollarini boshqarish
                    <a href="#" class="text-phoenix-primary"></a>
                </p>

                <div class="position-absolute end-5 top-0">
                    <a href="javascript:void()" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newUserModal">
                        <i class="fa-solid fa-user me-2 d-inline d-md-none"></i>
                        <span class="d-none d-md-inline">Yangi foydalanuvchi</span>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-12">
                @if($users->count())
                    @include('app.users.partials.list')
                @else
                    <div class="text-center">
                        @include('components.empty', [
                            'title' => 'Hali hech qanday forma mavjud emas',
                            'message' => 'Forma yarating va ma’lumot to‘plashni boshlang'
                        ])
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('app.users.partials.add')
    @include('app.users.partials.edit')
@endsection
@script('app.users.scripts.list')
