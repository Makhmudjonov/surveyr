<form action="{{ route('app.password.update') }}" id="passwordForm" onsubmit="updatePassword(event)">  
    @csrf  
    <div class="form-group">  
        <label for="currentPassword" class="form-label">Joriy parol</label>  
        <input name="current_password" class="form-control" type="password" placeholder="Joriy parolni kiriting" required>  
    </div>  
    <div class="form-group">  
        <label for="newPassword" class="form-label">Yangi parol</label>  
        <input name="new_password" class="form-control" type="password" placeholder="Yangi parolni kiriting" required>  
    </div>  
    <div class="form-group">  
        <label for="confirmPassword" class="form-label">Parolni tasdiqlang</label>  
        <input name="confirm_password" class="form-control" type="password" placeholder="Yangi parolni tasdiqlang" required>  
    </div>  
    <div class="form-group text-center pt-3">  
        <button class="btn btn-primary btn-form" type="submit">Parolni yangilash</button>  
    </div>  
</form>  
