<div class="card d-none setup-card" id="accessSettings">
    <div class="card-header py-3">
        <h5 class="card-title mb-0">Kirish sozlamalari</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('forms.setup.update', 'access', $form->id) }}" method="POST" id="accessSetupForm" onsubmit="submitForm(event)">
            @csrf

            <!-- TODO: email/mobil tasdiqlash -->

            <!-- tugash sanasi yo‘q switch -->
            <div class="mb-3">
                <div class="form-check form-switch position-relative">
                    <!-- belgilansa, tugash sanasi o‘chirilib, o‘chirib qo‘yiladi -->
                    <input class="form-check-input position-absolute end-0" type="checkbox" id="noClosingDate" value="1" name="is_indefinite" {{ $form->is_indefinite ? 'checked' : '' }} onchange="toggleClosingDate()">
                    <label class="form-check-label position-absolute start-0 fw-bold" for="noClosingDate">Tugash sanasi yo‘q</label>
                </div>
            </div>

            <script>
                function toggleClosingDate() {
                    const closingDate = document.getElementById('endDate');
                    closingDate.disabled = !closingDate.disabled;
                    closingDate.value = closingDate.disabled ? '' : closingDate.value;
                    closingDate.readOnly = closingDate.disabled;
                }
            </script>

            <div class="mb-3">
                <label for="startDate" class="form-label">Boshlanish sanasi</label>
                <input type="date" class="form-control date-selector" id="startDate" name="start_date" placeholder="boshlanish sanasi" value="{{ substring($form->start_date, 10, null) }}">
            </div>

            <div class="mb-3">
                <label for="endDate" class="form-label">Tugash sanasi</label>
                <input type="date" class="form-control date-selector" id="endDate" name="end_date" placeholder="tugash sanasi" value="{{ substring($form->end_date, 10, null) }}">
            </div>

            <div class="mb-3">
                <label for="accessCode" class="form-label">Kirish paroli</label>
                <small class="text-muted fs-10 ms-3 d-block">Shaklga kirishni cheklash uchun parol o‘rnatish (ishlab chiqilmoqda)</small>
                <input type="password" placeholder="ommaviy kirish uchun bo‘sh qoldiring" class="form-control" id="accessCode" name="access_code" value="{{ $form->access_code }}">
            </div>

            <div class="mb-3 position-relative">
                <label for="publicUrl" class="form-label">Ommaviy havola</label>
                <input type="text" class="form-control" id="publicUrl" readOnly value="{{ request()->getUrl() . route('forms.show', md5($form->id), $form->slug) }}">
                <button type="button" class="btn btn-light btn-sm mt-2 position-absolute" style="top: 0.45rem; right: 0.1rem;"
                    onclick="copyToClipboard('{{ request()->getUrl() . route('forms.show', md5($form->id), $form->slug) }}')">
                    <i class="fa-regular fa-clipboard"></i>
                </button>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary btn-sm w-100">Kirish ma’lumotlarini yangilash</button>
            </div>
        </form> 
    </div>
</div>
