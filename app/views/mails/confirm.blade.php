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
                <p>Bizning platformamizga xush kelibsiz! Ishni boshlash uchun, iltimos, quyidagi tugmani bosib elektron pochtangizni tasdiqlang:</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td><a href="{{ $confirmationLink }}" target="_blank">Emailni tasdiqlash</a></td>
                        </tr>
                    </tbody>
                </table>
                <p>Agar "Emailni tasdiqlash" tugmasini bosishda muammo yuzaga kelsa, quyidagi havolani brauzeringizga nusxalab qo‘ying va oching:</p>
                <p>{{ $confirmationLink }}</p>
                <p>Bizga qo‘shilganingiz uchun rahmat! Siz bilan hamkorlik qilishdan xursandmiz.</p>
                <p>Hurmat bilan,</p>
                <p>{{ _env('APP_NAME') }}</p>
            </td>
        </tr>
        
    </table>

@endsection
