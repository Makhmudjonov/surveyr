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
				<p>Siz ikki faktorni autentifikatsiyadan foydalanishni talab qildingiz (2FA). Kirish jarayonini yakunlash uchun quyidagi koddan foydalaning:</p>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
					<tbody>
						<tr style="text-align:center">
							<td style="font-size: 24px; font-weight: bold; padding: 10px;">
								{{ $token }}
							</td>
						</tr>
					</tbody>
				</table>
				<p>E'tibor bering, ushbu kod faqat cheklangan vaqt uchun amal qiladi.</p>
				<p>Agar siz ushbu kodni so'ramagan bo'lsangiz, iltimos, ushbu elektron pochtani e'tiborsiz qoldiring yoki darhol qo'llab-quvvatlash jamoamiz bilan bog'laning.</p>
				<p>Eng yaxshi tilaklar, - qo'llab-quvvatlash guruhi</p>
                <p>{{ _env('APP_NAME') }}</p>
			</td>
		</tr>
	</table>				

@endsection
