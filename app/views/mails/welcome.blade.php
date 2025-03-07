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
                <p>Sizning hisobingiz administrator tomonidan muvaffaqiyatli yaratilgan. Sizning kirish ma'lumotlaringiz:</p>
                <p><strong>Foydalanuvchi nomi:</strong> {{ $username }}</p>
                <p><strong>Parol:</strong> {{ $password }}</p>
                <p>Xavfsizlik nuqtai nazaridan birinchi logindan keyin parolingizni o'zgartirishni tavsiya qilamiz.</p>
                <p>Hisobingizga kirishingiz mumkin <a href="{{ _env('APP_URL') }}" target="_blank">Bu yerga</a>.</p>
                <p>Agar sizda biron bir savol bo'lsa yoki kelgusida yordam kerak bo'lsa, biz bilan bog'laning.</p>
                <p>Arabnni kutib oling!</p>
                <p>Eng yaxshi ezgu tilaklar bilan,</p>
                <p>{{ _env('APP_NAME') }}</p>
            </td>
        </tr>
        
    </table>

@endsection
