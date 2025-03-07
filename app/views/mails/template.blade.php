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
				<p>salom</p>
				<p>Ba'zida siz oddiy HTML elektron pochtasini oddiy dizayn va aniq qo'ng'iroq bilan yuborishingizni xohlaysiz. Bu shunday.</p>
				<table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
					<tbody>
						<tr style="text-align:center">
							<td> <a href="http://htmlemail.io" target="_blank">Harakatga qo'ng'iroq qiling</a> </td>
						</tr>
					</tbody>
				</table>
				<p>Bu haqiqatan ham oddiy elektron pochta shablonidir. Bu yagona maqsadi - bu pulsiz tugmachani bosish uchun qabul qiluvchini olishdir.</p>
				<p>Good luck! Hope it works.</p>
			</td>
		</tr>
	</table>				

@endsection