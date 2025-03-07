@extends('layouts.mail')
@section('content')

    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
        <tr>
            <td style="text-align:center; padding-top:1rem;">
                <img width="200" src="{{ _env('APP_URL') }}/assets/images/brand/logo-dark.png" alt="Logo">
            </td>
        </tr>
        <tr>
            <td class="wrapper">
                <p>Salom {{ $name }},</p>
                <p>Bizning platformamizga xush kelibsiz! Boshlash uchun quyidagi tugmani bosish orqali elektron pochta manzilingizni tasdiqlang:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td><a href="{{ $confirmationLink }}" target="_blank">E-pochta manzilini tasdiqlash</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>Agar siz “E-pochtani tasdiqlash” tugmasini bosishda muammoga duch kelsangiz, quyidagi URL manzilidan nusxa oling va veb-brauzeringizga joylashtiring:</p>
                <p>{{ $confirmationLink }}</p>
                <p>Bizga qo'shilganingiz uchun tashakkur! Sizni kemada ko'rganimizdan xursandmiz.</p>
                <p>Eng yaxshi ezgu tilaklar bilan,</p>
                <p> {{ _env('APP_NAME') }} </p>
            </td>
        </tr>
        
    </table>

@endsection