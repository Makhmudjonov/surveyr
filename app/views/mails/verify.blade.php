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
                <p>Biz bilan ro'yxatdan o'tganingiz uchun tashakkur. Iltimos, quyidagi tugmani bosib elektron pochta manzilingizni tasdiqlang:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td>
                                <a href="{{ '/auth/verify-email?token=' . $token }}" target="_blank" style="background-color:#3498db; color:white; padding:10px 20px; text-decoration:none;">Verify Email</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-top: 20px;">
                    <p>Shu bilan bir qatorda, siz brauzeringizda quyidagi havolani nusxalashingiz va joylashtirishingiz mumkin: <br>
                        <a href="{{ _env('APP_URL') . '/auth/verify-email?token=' . $token }}" target="_blank">{{ _env('APP_URL') . '/auth/verify-email?token=' . $token }}</a>
                    </p>
                </div>

                <p>Agar siz hisob qaydnomasini yaratmagan bo'lsangiz, boshqa chora kerak emas.</p>
                <p>Eng yaxshi ezgu tilaklar bilan, </p>
				<p>Jamoa - {{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection