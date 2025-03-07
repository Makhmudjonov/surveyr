@extends('layouts.app.main')
@style('/vendor/surveyjs/defaultV2.min.css','src')

@section('content')
    <div class="content">
        <div class="row">
            <div class="col-12 mb-4 position-relative">
                <h3 class="fs-7">{{ $form->title }}</h3>
                <p class="text-body-tertiary">
                    Formaga yuborilgan ma'lumotlarni ko'rish, tahlil qilish va boshqarish
                </p>

                <!-- TODO: Tuzilgan formani ko‘rish tugmachasini qo‘shish -->
                <div class="position-absolute top-0 d-none" style="right:8rem;">
                    <button class="btn btn-primary d-inline" id="compiledView" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Tuzilgan formani ko'rish">
                        <i class="fa-solid fa-list"></i>
                    </button>
                </div>

                <div class="position-absolute end-5 top-0">
                    <select id="reviewInput" class="form-selector d-inline" data-placeholder="Baholashni tanlang" data-collection-id="{{ $collection->id }}">
                        @foreach ($form->reviews as $review)
                            <option value="{{ $review }}" {{ $collection->review == $review ? 'selected' : '' }}>{{ ucfirst($review) }}</option>                            
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div id="surveyContainer"></div>
            </div>
        </div>
    </div>
@endsection

@script('/vendor/surveyjs/survey.core.min.js','src')
@script('/vendor/surveyjs/survey-js-ui.min.js','src')
@script('/vendor/surveyjs/themes/index.min.js','src')

@script('app.collections.scripts.show')
