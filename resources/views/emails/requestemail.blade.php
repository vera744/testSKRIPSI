@component('mail::message')
<h3>Halo, {{ $nama }} !</h3>
<hr>

Kami telah menerima request gadai anda. 

Request anda akan kami tinjau dan kami proses dalam kurun waktu 1-3 hari kerja.

Dimohon untuk mengecek email dan web secara berkala

@component('mail::button', ['url' =>'#'])
Button Contoh
@endcomponent

Thank you, <br>
<h3>Customer Service Pegadaian Digital</h3>
{{-- {{config('app.name')}} --}}
@endcomponent