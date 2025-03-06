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
                <p>Biz bilan ro‘yxatdan o‘tganingiz uchun tashakkur. Iltimos, quyidagi tugmani bosish orqali elektron pochta manzilingizni tasdiqlang:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td>
                                <a href="{{ '/auth/verify-email?token=' . $token }}" target="_blank" style="background-color:#3498db; color:white; padding:10px 20px; text-decoration:none;">Emailni tasdiqlash</a>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin-top: 20px;">
                    <p>Bundan tashqari, quyidagi havolani brauzeringizga nusxalab joylashtirishingiz mumkin: <br>
                        <a href="{{ _env('APP_URL') . '/auth/verify-email?token=' . $token }}" target="_blank">{{ _env('APP_URL') . '/auth/verify-email?token=' . $token }}</a>
                    </p>
                </div>

                <p>Agar siz ushbu hisobni yaratmagan bo‘lsangiz, hech qanday harakat talab etilmaydi.</p>
                <p>Hurmat bilan, </p>
				<p>Jamoa - {{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection
