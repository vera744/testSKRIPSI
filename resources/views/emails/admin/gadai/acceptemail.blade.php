@component('mail::message')
#Konfirmasi Request Gadai

<h3>Halo, {{ $custName}} !</h3>
<hr>

Request gadai yang anda ajukan telah kami terima.

Admin kami akan segera menghubungi anda untuk
menentukan jadwal pengambilan barang.

Atas perhatiannya, kami ucapkan banyak terima
kasih.

@component('mail::button', ['url' =>'http://127.0.0.1:8000/gadai'])
Lihat Status
@endcomponent

Hormat kami, <br>
<h3>Customer Service PT. Garda Dana Indonesia, tbk</h3>
{{-- {{config('app.name')}} --}}
@endcomponent