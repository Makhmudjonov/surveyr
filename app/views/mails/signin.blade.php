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
                <p>Biz sizga yangi qurilmadan akkauntingizga kirilganligini bildirmoqchimiz. Agar akkauntingizda shubhali harakatlarni sezsangiz, darhol biz bilan bog'laning va parolingizni o'zgartirib akkauntingizni himoya qiling.</p>
                <p>Hurmat bilan,</p>
                <p>Jamoa - {{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection
