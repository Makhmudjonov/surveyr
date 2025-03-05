@extends('layouts.app.main')
@section('content')
    <div class="content">

        <div class="row mb-3 gy-6">

            <div class="col-12 col-xxl-2">
                <div class="row align-items-center g-3 g-xxl-0 h-100 align-content-between">

                    @foreach ($stats as $stat)
                        <div class="col-12 col-sm-6 col-md-3 col-lg-6 col-xl-3 col-xxl-12 mb-3">
                            <div class="d-flex align-items-center">
                                <i class="{{ $stat['icon'] }} fs-4 lh-1"></i>
                                <div class="ms-3">
                                    <div class="d-flex align-items-end">
                                        <h2 class="mb-0 me-2 fs-4">{{ $stat['count'] }}</h2>
                                        <span class="fs-7 fw-semibold text-body">{{ $stat['title'] }}</span>
                                    </div>
                                    <p class="text-body-secondary fs-9 mb-0">{{ $stat['subtitle'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

            <div class="col-12 col-xl-6 col-xxl-5">
                @if(count($statsChart))
                    <div class="mx-xxl-0">
                        <div id="submissionBarChart" style="width: 100%; height: 400px;"></div>
                    </div>
                @else
                    <div id="submissionBarChart" comment="error suppression" class="d-none"></div>
                    @include('components.empty', [
                        'title' => 'Hali hech qanday yuborishlar yo‘q',
                        'message' => 'Shakl yarating va ma’lumotlarni to‘plashni boshlang'
                    ])
                @endif
            </div>

            <div class="col-12 col-xl-6 col-xxl-5">
                <div class="card border h-100 w-100 overflow-hidden">
                    <div class="bg-holder d-block bg-card" style="background-image:url(/assets/images/vector/welcome_bg.png);background-position: top right;"></div>
                    <div class="d-dark-none">
                        <div class="bg-holder d-none d-sm-block d-xl-none d-xxl-block bg-card"></div>
                    </div>
                    <div class="d-light-none">
                        <div class="bg-holder d-none d-sm-block d-xl-none d-xxl-block bg-card" style="background-image:url(../assets/img/spot-illustrations/dark_21.png);background-position: bottom right; background-size: auto;"></div>
                    </div>
                    <div class="card-body px-5 position-relative">
                        <h3 class="mb-5 mt-2 fs-3">Surveyr-ga xush kelibsiz</h3>
                        <p class="text-body-tertiary fw-semibold">
                            Har qanday maqsad uchun chiroyli va funktsional shakllar yarating — aloqa, ro‘yxatdan o‘tish, so‘rovlar va boshqalar. Kod yozish shart emas. Bir necha daqiqada shakl yarating va joylashtiring.
                        </p>

                        <p class="text-danger fw-semibold mt-4">Ogohlantirish</p>
                        <p class="text-body-tertiary">
                            Surveyr ochiq manba vositasi bo‘lsa-da, u <span class="text-info fw-bold">SurveyJS</span> platformasidan foydalanadi. Shu sababli, Surveyr faqat notijorat maqsadlarda ishlatilishi mumkin, agar siz SurveyJS dan ishlab chiquvchi litsenziyasini olmagan bo‘lsangiz. Batafsil ma’lumot uchun quyidagi havolani ko‘rib chiqing: <a href="https://surveyjs.io/licensing" class="fw-bold text-info" target="_blank">SurveyJS litsenziyasi.</a>
                        </p>
                    </div>
                    <div class="card-footer border-0 py-0 px-5 z-1">
                        <p class="text-body-tertiary fw-semibold">GitHub’da <a href="https://github.com/ibnsultan">ibnsultan</a> ni kuzatib boring</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-header-title">Oxirgi yuborishlar</h4>
                    </div>
                    <div class="card-body" style="min-height: 400px;">
                        @if($recentSubmissions->count())
                            <div style="overflow-x:auto">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Shakl nomi</th>
                                            <th class="text-center">Yuborilgan</th>
                                            <th class="text-center">Ko‘rib chiqilmoqda</th>
                                            <th class="text-end">Oxirgi yuborish</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($recentSubmissions as $submission)
                                            <tr>
                                                <td class="align-middle ps-1">
                                                    <a href="@route('forms.submissions', $submission->form_id)">
                                                        {{ $submission->form->title }}
                                                    </a>
                                                </td>
                                                <td class="align-middle text-center">{{ $submission->submission }}</td>
                                                <td class="align-middle text-center">{{ $submission->pending_review }}</td>
                                                <td class="align-middle text-end pe-1">{{ carbon()::parse($submission->latest_submission)->diffForHumans() }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>                        
                        @else
                            @include('components.empty', [
                                'title' => 'Hali hech qanday yuborishlar yo‘q',
                                'message' => 'Shakl yarating va ma’lumotlarni to‘plashni boshlang'
                            ])
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@script('/vendor/echarts/echarts.min.js','src')
@script('app.dashboard.scripts.charts')