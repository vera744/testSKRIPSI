@component('mail::message')
# Activation Email

Hi, <b>{{$user->name}}</b>
<br>

Berikut kode OTP anda <b>{{$user->token_activation}}</b>  <br>
Silahkan masukkan kode OTP tersebut untuk verifikasi
akun anda.


Hormat kami, <br>
<h3>Customer Service PT. Garda Dana Indonesia, tbk</h3>
@endcomponent
