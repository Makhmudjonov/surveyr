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
                <p>salom {{ $name }},</p>
                <p>Hisobingizdagi har qanday shubhali faoliyatni shubha ostiga qo'ygan bo'lsangiz, parolingizni o'zgartirish orqali biz bilan bog'laning va hisobingizni o'zgartirish orqali biz bilan bog'laning va hisobingizni o'zgartirish orqali biz bilan bog'laning va hisobingizni himoya qilish orqali biz bilan bog'laning va hisobingizni o'zgartirish orqali biz bilan bog'laning va hisobingizni o'zgartirish orqali biz bilan bog'laning.</p>
                <p>Eng yaxshi ezgu tilaklar bilan, </p>
				<p>Jamoa - {{ _env('APP_NAME') }}</p>
            </td>
        </tr>
    </table>

@endsection