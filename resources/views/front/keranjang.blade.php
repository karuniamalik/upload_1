@extends('layouts.main')

@section('container')
    {{-- {{ print_r($data) }} --}}

    <table class="table table-striped " id="">
        <thead>
            <tr>
                <th>Nama Barang</th>
                <th>Gambar</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Sub total</th>

            </tr>
        </thead>

        <tbody>
            @foreach ($data as $d)
                <tr>
                    <td>{{ $d->name }}</td>
                    <td>
                        <img src="{{ asset('storage/' . $d->attributes->image) }}" alt="no image">

                    </td>
                    <td>
                        <form action="{{ route('update.keranjang') }}" method="POST">
                            @csrf
                            <input class="w-25 text-center" type="hidden" value="{{ $d->id }}" name="id">
                            <input class="w-25 text-center" type="number" value="{{ $d->quantity }}" name="quantity">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </td>
                    <td>{{ $d->price }}</td>
                    <td>{{ $d->price * $d->quantity }}</td>

                    {{-- <td>{{Cart::getSubTotal($d->quantity)}}</td> --}}
                    <td> <a href="{{ url('hapus_keranjang/' . $d->id) }}" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                    </td>

                </tr>

                <input class="w-25 text-center nama_barang" type="hidden" value="{{ $d->name }}">
                <input class="w-25 text-center qty" type="hidden" value="{{ $d->quantity }}">
                <input class="w-25 text-center harga" type="hidden" value="{{ $d->price }}">
            @endforeach

        </tbody>

    </table>

    <h3>
        Total : {{ Cart::getTotal() }}
    </h3>
    {{-- Total : {{ $data->count() }}        --}}
    <input class="w-25 text-center" type="hidden" value=" {{ Cart::getTotal() }} " id="total" name="total">

    @if (Auth::user())
        <input type="button" id='bayar' class="btn btn-primary ms-auto" value="Bayar Menggunakan Midtrans">
    @else
        <a class="btn btn-dark px-4 border-light" href="{{ url('register') }}">DAFTAR DULU SEBELUM ORDER</a>
    @endif
@endsection
