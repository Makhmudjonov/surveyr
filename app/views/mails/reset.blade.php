@extends('layouts.mail')
@section('content')

    <!-- Test Xabar -->
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="main">
        <tr>
            <td style="text-align:center; padding-top:1rem;">
                <img width="200" src="{{ _env('APP_URL') }}/assets/images/brand/logo-dark.png" alt="Logo">
            </td>
        </tr>
        <tr>
            <td class="wrapper">
                <p>Salom {{ $name }},</p>
                <p>Biz sizning parolni tiklash so‘rovini oldik. Agar siz bunday so‘rov yubormagan bo‘lsangiz, ushbu xatni e'tiborsiz qoldiring.</p>
                <p>Parolingizni tiklash uchun quyidagi tugmani bosing:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td><a href="{{_env('APP_URL')}}/auth/password/{{ $token }}" target="_blank">Parolni tiklash</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>Agar "Parolni tiklash" tugmasini bosishda muammo yuzaga kelsa, quyidagi havolani brauzeringizga nusxalab qo‘ying va oching:</p>
                <p><a href="{{_env('APP_URL')}}/auth/password/{{ $token }}" target="_blank">{{_env('APP_URL')}}/auth/password/{{ $token }}</a></p>
                <p>Ushbu parolni tiklash havolasi 2 soatdan keyin eskiradi.</p>
                <p>Agar siz parolni tiklashni so‘ramagan bo‘lsangiz, ushbu xabarni e'tiborsiz qoldiring.</p>
                <p>Hurmat bilan,</p>
                <p>{{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection
