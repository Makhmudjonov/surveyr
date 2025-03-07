<form action="{{ route('app.profile.update') }}" id="profileForm" onsubmit="submitForm(event)">  
    @csrf  
    <div class="form-group">  
        <label for="username" class="form-label">Foydalanuvchi nomi</label>  
        <input name="username" class="form-control" type="text" required  
            value="{{ ($loggedUser->username != '') ? $loggedUser->username : $loggedUser->fullname }}">  
    </div>  
    <div class="form-group">  
        <label for="fullname" class="form-label">To'liq ism</label>  
        <input name="fullname" class="form-control" type="text" value="{{ $loggedUser->fullname }}" required>  
    </div>  
    <div class="form-group">  
        <label for="email" class="form-label">Email manzili</label>  
        <input name="email" class="form-control" type="email" value="{{ $loggedUser->email }}" required>  
    </div>  
    <div class="form-group">  
        <label for="avatar" class="form-label">Profil rasmi</label>  
        <input name="avatar" class="form-control" type="file" accept="image/*">  
    </div>  
    <div class="form-group text-center pt-3">  
        <button class="btn btn-primary btn-form" id="btnUpdateProfile" type="submit">Profilni yangilash</button>  
    </div>  
</form>                                        
