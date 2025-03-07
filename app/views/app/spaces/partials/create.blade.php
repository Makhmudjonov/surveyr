<div class="modal fade" id="createSpaceModal" tabindex="-1" aria-labelledby="createSpaceModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-8" id="createSpaceModalLabel">Yangi bo‘shliq yaratish</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Yopish"></button>
            </div>
            <div class="modal-body">
                <form action="@route('spaces.store')" method="post" id="createSpaceForm" onsubmit="submitForm(event)">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="spaceName" class="form-label">Bo‘shliq nomi</label>
                        <input type="text" class="form-control" id="spaceName" name="spaceName" placeholder="Bo‘shliq nomini kiriting" required>
                    </div>

                    <div class="mb-3">
                        <label for="spaceDescription" class="form-label">Tavsif</label>
                        <textarea class="form-control" id="spaceDescription" name="spaceDescription" placeholder="Bo‘shliq tavsifi" rows="2" required></textarea>
                    </div>

                    <!-- Rang tanlash -->
                    <div class="mb-3">
                        <label for="spaceColor" class="form-label">Bo‘shliq rangi</label>
                        <input type="color" class="form-control" id="spaceColor" name="spaceColor" required style="height: 40px;">
                    </div>

                    <div class="mb-3">
                        <label for="spaceMembers" class="form-label d-block mb-2">A'zolar</label>
                        <select class="form-selector" id="spaceMembers" name="spaceMembers[]" data-live-search="true" title="Bo‘shliq hamkorlarini tanlang" multiple>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" id="createSpacebtn" class="btn btn-primary w-100">Bo‘shliq yaratish</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>
