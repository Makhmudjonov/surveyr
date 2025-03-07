@extends('layouts.app.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 mb-4 position-relative">
                <h3 class="fs-7">Forma Bo‘shliqlari</h3>
                <p class="text-body-tertiary">
                    Formangizni tartibli saqlash uchun bo‘shliqlardan foydalaning.
                </p>

                <div class="position-absolute end-5 top-0">
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createSpaceModal">
                        <i class="fa-solid fa-plus d-inline d-md-none"></i>
                        <span class="d-none d-md-inline">Yangi Bo‘shliq</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row">
            @if($spaces->count())
                @foreach($spaces as $space)
                    <div class="col-xl-3 col-md-4 col-sm-6 col-12 mb-3">
                        <div class="card" style="border-top: 7px solid {{ $space->color }}">
                            <div class="card-body pb-1 posotion-relative">
                                <a href="{{ route('spaces.show', $space->id) }}" class="fs-7 fw-bold text-primary">
                                    {{ $space->name }}
                                </a>
                                <span class="d-inline-block text-truncate w-100 mt-1">
                                    <span>{{ $space->description }}</span>
                                </span>
                                <span class="d-block text-body-secondary mt-3 fs-10 fw-bold">Tomonidan: {{ $space->user->fullname }}</span>

                                @if($space->user_id == auth()->id())
                                    <div class="position-absolute top-5 end-3">
                                        <div class="dropdown">
                                            <button class="btn btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis text-info"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="dropdown-item" href="{{ route('spaces.show', $space->id) }}">
                                                        <i class="fa-solid fa-edit me-2"></i>
                                                        Bo‘shliqni boshqarish
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-danger" onclick="confirmDelete(event)" href="{{ route('spaces.delete', $space->id) }}">
                                                        <i class="fa-solid fa-trash me-2"></i>
                                                        Bo‘shliqni o‘chirish
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-auto">
                                        {{ \App\Models\Space::spaceForms($space->id)->count() }} Forma
                                    </div>
                                    <div class="col-auto text-end">

                                        @php $collaborators = \App\Models\Space::spaceMembers($space->id) @endphp
                                        @if($collaborators->count())
                                            <div class="avatar-group avatar-group-dense d-block mx-auto">
                                                @foreach($collaborators as $collaborator)
                                                    <div class="avatar avatar-s rounded-circle">
                                                        <img class="rounded-circle" src="{{ urlPath($collaborator->avatar) }}" alt="{{ $collaborator->fullname }}">
                                                    </div>
                                                @endforeach
                                            </div>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col-12">
                    @include('components.empty', [
                        'emptyTitle' => 'Hech narsa topilmadi',
                        'emptyText' => 'Hech qanday bo‘shliq topilmadi, yangi bo‘shliq yaratib ishni boshlang.'
                    ])
                </div>
            @endif
        </div>
    </div>

    @include('app.spaces.partials.create')

@endsection()
