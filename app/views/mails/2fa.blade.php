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
				<p>Siz ikki faktorli autentifikatsiya (2FA) orqali tizimga kirishni so‘radingiz. Kirish jarayonini yakunlash uchun quyidagi koddan foydalaning:</p>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
					<tbody>
						<tr style="text-align:center">
							<td style="font-size: 24px; font-weight: bold; padding: 10px;">
								{{ $token }}
							</td>
						</tr>
					</tbody>
				</table>
				<p>Diqqat qiling, ushbu kod faqat cheklangan vaqt davomida amal qiladi.</p>
				<p>Agar siz ushbu kodni so‘ramagan bo‘lsangiz, ushbu xatni e'tiborsiz qoldiring yoki darhol qo‘llab-quvvatlash jamoamizga murojaat qiling.</p>
				<p>Hurmat bilan,<br>Qo‘llab-quvvatlash jamoasi</p>
                <p>{{ _env('APP_NAME') }}</p>
			</td>
		</tr>
	</table>				

@endsection
