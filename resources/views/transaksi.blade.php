@extends('template')

@section('main')

<h1 class="mb-1">Transaksi Saya</h1><br>

<table border="1">
<tr>
   <th>user id</th>
  <th>Order id</th>
  <th>Nama Produk</th>
  <th>Harga</th>
  <th>Jumlah</th>
  <th>Date</th>
  <th>Status</th>
</tr>
  @foreach($data as $dt)
 
<tr>
  <td>{{ $dt->user_id }}</td>
  <td>{{ $dt->order_id }}</td>
  <td>{{ $dt->nama_barang }}</td>
  <td>{{ $dt->harga }}</td>
  <td>{{ $dt->qty }}</td>
  <td>{{ $dt->date }}</td>
  <td>{{ $dt->status }}</td>

</tr>
  @endforeach
</table>

@endsection