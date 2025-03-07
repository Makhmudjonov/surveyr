<div class="card setup-card h-100" id="generalSettings">
    <div class="card-header py-3">
            <h5 class="card-title mb-0">Umumiy Sozlamalar</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('forms.setup.update', 'general', $form->id) }}" method="POST" id="generalSetupForm" onsubmit="submitForm(event)">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Shakl nomi</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $form->title }}" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Shakl tavsifi</label>
                <textarea class="form-control" id="description" name="description" rows="3" required>{{ $form->description }}</textarea>
            </div>

            <div class="mb-3">
                <label for="collaborators" class="form-label">Hamkorlar</label>
                <select class="form-selector" id="collaborators" name="collaborators[]" multiple style="visibility: hidden;">
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ in_array($user->id, $form->collaborators) ? 'selected' : '' }}>{{ $user->fullname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="space" class="form-label">Bo‘lim</label>
                <select class="form-selector" id="space" name="spaces[]" multiple style="display: none;">
                    <option value="">Bo‘lim tanlang</option>
                    @foreach ($spaces as $space)
                        <option value="{{ $space->id }}" {{ in_array($space->id, $form->spaces) ? 'selected' : '' }}>{{ $space->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mt-5">
                <button type="submit" class="btn btn-primary btn-sm w-100">Ma'lumotlarni yangilash</button>
            </div>
        </form>
    </div>
</div>
