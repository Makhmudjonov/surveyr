<!-- foydalanuvchini tahrirlash modal oynasi -->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editUserModalLabel">Foydalanuvchini tahrirlash</h5>
            </div>
            <div class="modal-body">
                <form action="{{ route('users.update') }}" method="post" id="editUserForm" onsubmit="submitForm(event)">
                    @csrf
                    <input type="hidden" name="id" id="editUserId">
                    
                    <div class="mb-3">
                        <label for="editFullname" class="form-label">Ism va familiya</label>
                        <input type="text" class="form-control" id="editFullname" name="fullname" placeholder="Ali Valiyev" required>
                    </div>

                    <div class="mb-3">
                        <label for="editEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="editEmail" name="email" placeholder="vali@example.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="editRole" class="form-label">Roli</label>
                        <select class="form-selector" id="editRole" name="role" data-placeholder="Foydalanuvchi rolini tanlang" required>
                            <option value="user">Foydalanuvchi</option>
                            <option value="moderator">Moderator</option>
                            @if($loggedUser->role === 'admin')
                                <option value="admin">Administrator</option>
                            @endif
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary w-100">Yangilash</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
