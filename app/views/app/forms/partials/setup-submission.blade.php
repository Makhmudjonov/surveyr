<div class="card d-none setup-card" id="submissionSettings">
    <div class="card-header py-3">
        <h5 class="card-title mb-0">Yuborish Sozlamalari</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('forms.setup.update', 'submission', $form->id) }}" method="POST" id="submissionSetupForm" onsubmit="submitForm(event)">
            @csrf

            <div class="row">
                <!-- Ko'rib chiqish formati -->
                <div class="col-12 mb-3">
                    <label for="reviewFormat" class="form-label d-block">Ko‘rib Chiqish Formati</label>
                    <small class="text-muted fs-10 ms-3 d-block">Ushbu shakl uchun ko‘rib chiqish formatini tanlang</small>
                    <select class="form-selector" id="reviewFormat" name="reviews" data-placeholder="Ko‘rib chiqish formatini tanlang">
                        @foreach ($reviewTypes as $review)
                            <option
                                value="{!! json_encode($review->properties) !!}"
                                {{ array_diff($review->properties, $form->reviews)  ? '' : 'selected' }}>
                                {{ $review->name }} ({{ implode(', ', $review->properties) }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Yo‘naltirish URL -->
                <div class="col-12 mb-3">
                    <label for="redirectionUrl" class="form-label d-block">Yo‘naltirish Havolasi</label>
                    <small class="text-muted fs-10 ms-3 d-block">Foydalanuvchilar yuborishdan keyin yo‘naltiriladigan manzil</small>
                    <input type="text" class="form-control" placeholder="Yo‘naltirish URL" id="redirectionUrl" name="redirection_url" value="{{ $form->content['navigateToUrl'] ?? null }}">
                </div>

                <!-- Webhook URL -->
                <div class="col-12 mb-3">
                    <label for="WebhookUrl" class="form-label d-block">Webhook Havolasi</label>
                    <small class="text-danger fs-10 ms-3 d-block">CORS muammolarining oldini olish uchun ushbu saytni ilovangizda oq ro‘yxatga kiritganingizga ishonch hosil qiling</small>
                    <input type="text" class="form-control" placeholder="Webhook URL" id="WebhookUrl" name="webhook_url" value="{{ $form->webhook_url }}">
                </div>

                <div class="col-12 mt-5 mx-auto">
                    <button type="submit" class="btn btn-primary btn-sm w-100">Shakl Tafsilotlarini Yangilash</button>
                </div>
            </div>
        </form>
    </div>
</div>
