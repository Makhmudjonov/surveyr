@extends('layouts.app.main')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 mb-4 position-relative">
                <h3 class="fs-7">{{ $space->name }}</h3>
                <p class="text-body-tertiary" style="max-width: 250px;">
                    {{ $space->description }}
                </p>

                @if($space->user_id == auth()->id())
                    <div class="position-absolute end-5 top-0">
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editSpaceModal">
                            <i class="fa-solid fa-plus d-inline d-md-none"></i>
                            <span class="d-none d-md-inline">Bo‘shliqni tahrirlash</span>
                        </button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                @if($forms->count())
                    <div class="card">
                        <div class="card-body">
                            @include('app.forms.partials.list')
                        </div>
                    </div>
                @else
                    <div class="">
                        @include('components.empty', [
                            'title' => 'Bu bo‘shliqda hech qanday forma yo‘q',
                            'message' => 'Forma yarating va uni ushbu bo‘shliqqa qo‘shing'
                        ])
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="modal fade" id="editSpaceModal" tabindex="-1" role="dialog" aria-labelledby="editSpaceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editSpaceModalLabel">Bo‘shliqni tahrirlash</h5>
                </div>
                <div class="modal-body">
                    <form action="{{ route('spaces.update') }}" method="post" id="editSpaceForm" onsubmit="submitForm(event)">
                        @csrf
                        <input type="hidden" name="spaceId" value="{{ $space->id }}">
                        
                        <div class="mb-3">
                            <label for="spaceName" class="form-label">Nomi</label>
                            <input type="text" class="form-control" id="spaceName" name="spaceName" value="{{ $space->name }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="spaceDescription" class="form-label">Tavsif</label>
                            <textarea class="form-control" id="spaceDescription" name="spaceDescription" rows="3" required>{{ $space->description }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="spaceMembers" class="form-label d-block mb-2">A'zolar</label>
                            <select class="form-selector" id="spaceMembers" name="spaceMembers[]" data-live-search="true" title="Bo‘shliq hamkorlarini tanlang" multiple>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id, $space->members) ? 'selected' : '' }}>{{ $user->fullname }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">Bo‘shliqni yangilash</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
