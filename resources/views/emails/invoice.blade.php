@component('mail::message')
Tagihan Pemesanan <br>
Nomor Tagihan.  #BACKIND2018{{$booking_detail->id_booking+100}}

Hai {{ Auth::user()->name }},
Terima kasih sudah melakukan pemesanan melalui aplikasi Backind.
Berikut adalah lampiran tagihan anda :
<br>
<br>
<table>
  <tr>
    <td>
      <label style="font-size:small">Nomor Tagihan</label>
    </td>
    <td>
      <label style="font-size:small">:</label>
    </td>
    <td>
      <label style="font-size:small">#BACKIND2018{{$booking_detail->id_booking+100}}</label>
    </td>
  </tr>
  <tr>
    <td>
      <label style="font-size:small">Total Tagihan</label>
    </td>
    <td>
      <label style="font-size:small">:</label>
    </td>
    <td>
      <label style="font-size:small"><b>Rp. {{$booking_detail->total_cost}},-</b></label>
    </td>
  </tr>
</table>
<br>
<br>
Pembayaran dapat dilakukan sebelum <b>{{$booking_detail->duedate}}</b>
, segera selesaikan pembayaran dan unggah bukti pembayaran untuk menyelesaikan pemesanan.
@component('mail::button', ['url' => ''])
Selesaikan Pemesanan
@endcomponent

Thanks,<br>
{{ config('app.name') }}<br><br>
Jalan Telekomunikasi No.1<br>
Gedung Karang C223 Telkom University<br>
Dayeuhkolot, Kabupaten Bandung - 42116
@endcomponent
