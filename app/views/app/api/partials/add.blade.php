<!-- API kalit yaratish uchun modal oynasi -->
<div class="modal fade" id="createApiKeyModal" tabindex="-1" aria-labelledby="createApiKeyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <!-- Modal sarlavhasi -->
                <h5 class="modal-title" id="createApiKeyModalLabel">API Kalitni yaratish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
            </div>
            <!-- Forma: API kalit yaratish -->
            <form action="@route('keys.create')" method="POST" onsubmit="submitForm(event)">
                @csrf
                <div class="modal-body">
                    <!-- Kalit nomi kiritiladigan joy -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nomi</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masalan: Wordpress kaliti" required>
                    </div>
                    <!-- Kalit paroli (Passphrase) -->
                    <div class="mb-3">
                        <label for="passphrase" class="form-label">Maxfiy so‘z (Passphrase)</label>
                        <input type="text" class="form-control" id="passphrase" name="passphrase" placeholder="Masalan: 123456" required>
                        <small>Kalitni autentifikatsiya qilish uchun ishlatiladi, uni xavfsiz joyda saqlang.</small>
                    </div>
                    <!-- Yaratish tugmasi -->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Yaratish</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
