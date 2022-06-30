@extends('layouts.main')

@section('container')

<h1>a</h1>
{{-- {{ print_r($data) }} --}}

   <table class="table table-striped " id="">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Gambar</th>
                            <th>Qty</th>
                            <th>Harga</th>
                           
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>
                              <img src="{{asset('storage/'. $d->attributes->image)  }}" alt="">
                            </td>
                            <td>

                            <form action="" method="POST">
                              @csrf
                              <input  class="w-25 text-center" type="hidden" value="{{ $d->id}}" name="id">
                                                         
                              <input class="w-25 text-center" type="number" value="{{ $d->quantity}}" name="quantity">
                              <button type="submit" class="btn btn-primary"> Update</button>
                            </form>

                            </td>
                            <td>{{$d->price }}</td>
                                                     
                        </tr>
                       
                        @endforeach
                    </tbody>
                </table>
         
                  <h3>
                    Total : {{ Cart::getTotal() }}
                  </h3>
         
    


@endsection