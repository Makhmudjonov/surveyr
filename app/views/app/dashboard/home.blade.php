<div class="modal fade" id="aiFormModal" tabindex="-1" aria-labelledby="aiFormModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="aiFormModalLabel">AI Shakl Yaratish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
            </div>
            <div class="modal-body">
                <form action="@route('forms.generate')" method="POST" onsubmit="submitForm(event)">
                    @csrf
                    <div class="mb-3">
                        <input type="text" class="form-control" id="formTitle" name="title" placeholder="Shakl nomi, masalan: Talabalar Ro‘yxatga Olish" required>
                    </div>
                    <div class="position-relative mb-3">
                        <textarea class="form-control" id="formDescription" name="description" rows="25" placeholder="Shakl tavsifini kiriting" required></textarea>

                        <div class="position-absolute" style="bottom:-1.4rem;">
                            <a href="javascript:void(0)" class="fs-9 text-info" onclick="generateSampleDescription(1)">Namuna 1</a> | 
                            <a href="javascript:void(0)" class="fs-9 text-info" onclick="generateSampleDescription(2)">Namuna 2</a>
                        </div>

                        <button type="submit" class="btn btn-primary position-absolute" style="bottom:0.5rem; right:0.4rem; z-index:1">Yaratish</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
