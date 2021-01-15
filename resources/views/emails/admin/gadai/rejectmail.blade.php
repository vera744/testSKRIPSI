@component('mail::message')

<h3>Halo, {{ $custName}} !</h3>
<hr>

Mohon maaf, request gadai yang anda ajukan ditolak dikarenakan adanya suatu informasi yang tidak sesuai.

Mohon menghubungi admin kami untuk informasi lebih lanjut.

Atas perhatiannya, kami ucapkan banyak terima
kasih.

@component('mail::button', ['url' =>'http://127.0.0.1:8000/gadai'])
Lihat Status
@endcomponent

Sincerely, <br>
<h3>Customer Service Pegadaian Digital</h3>
{{-- {{config('app.name')}} --}}
@endcomponent