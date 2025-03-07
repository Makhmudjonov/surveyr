@extends('layouts.mail')
@section('content')

    <!-- Test Mail -->
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
        <tr>
            <td style="text-align:center; padding-top:1rem;">
                <img width="200" src="{{ _env('APP_URL') }}/assets/images/brand/logo-dark.png" alt="Logo">
            </td>
        </tr>
        <tr>
            <td class="wrapper">
                <p>Salom {{ $name }},</p>
                <p>Parolingizni tiklash uchun biz so'rovni oldik. Agar siz ushbu so'rovni amalga oshirmagan bo'lsangiz, ushbu elektron pochtani e'tiborsiz qoldirishingiz mumkin.</p>
                <p>Parolingizni tiklash uchun quyidagi tugmani bosing:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td><a href="{{_env('APP_URL')}}/auth/password/{{ $token }}" target="_blank">Parolni tiklash</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>Agar siz "Parolni tiklash" tugmachasini bosishda muammolarga duch kelsangiz, veb-brauzeringizga quyidagi URL manzilini nusxalash va joylashtirish:</p>
                <p><a href="{{_env('APP_URL')}}/auth/password/{{ $token }}" target="_blank">{{_env('APP_URL')}}/auth/password/{{ $token }}</a></p>
                <p>Ushbu parolni tiklash havolasi 2 soat ichida tugaydi.</p>
                <p>Agar siz parolni tiklashni talab qilmagan bo'lsangiz, iltimos, ushbu xabarni e'tiborsiz qoldiring.</p>
                <p>Eng yaxshi ezgu tilaklar bilan,</p>
                <p>{{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection
