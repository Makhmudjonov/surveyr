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
                <p>Salom,</p>
                <p>Ba'zan siz oddiy HTML email yuborishni xohlaysiz, oddiy dizayn va aniq harakatga chaqiruv bilan. Bu shunday email.</p>
                <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                    <tbody>
                        <tr style="text-align:center">
                            <td> <a href="http://htmlemail.io" target="_blank">Harakatga chaqiruv</a> </td>
                        </tr>
                    </tbody>
                </table>
                <p>Bu juda oddiy email shabloni. Uning yagona maqsadi - qabul qiluvchini tugmani bosishga undash.</p>
                <p>Omad! Umid qilamiz, ishlaydi.</p>
            </td>
        </tr>
    </table>

@endsection
