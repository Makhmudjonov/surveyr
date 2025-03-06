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
                <p>Sizning hisobingiz administrator tomonidan muvaffaqiyatli yaratildi. Quyida tizimga kirish ma'lumotlaringiz keltirilgan:</p>
                <p><strong>Foydalanuvchi nomi:</strong> {{ $username }}</p>
                <p><strong>Parol:</strong> {{ $password }}</p>
                <p>Xavfsizlik nuqtai nazaridan, birinchi marta tizimga kirganingizdan so‘ng parolingizni o‘zgartirishingizni tavsiya qilamiz.</p>
                <p>Hisobingizga <a href="{{ _env('APP_URL') }}" target="_blank">shu yerda</a> kirishingiz mumkin.</p>
                <p>Agar savollaringiz bo‘lsa yoki qo‘shimcha yordam kerak bo‘lsa, biz bilan bog‘laning.</p>
                <p>Xush kelibsiz!</p>
                <p>Hurmat bilan,</p>
                <p>{{ _env('APP_NAME') }}</p>
            </td>
        </tr>
        
    </table>

@endsection