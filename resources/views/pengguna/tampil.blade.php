@extends('template')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h1>Data User</h1>
            <div class="mt-3">
              

                <table class="table table-striped " id="">
                    <thead>
                        <tr>
                            <th>Nama </th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Action</th>


                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d->name }}</td>
                            <td>{{$d->email }}</td>
                            <td>{{$d->jabatan }}</td>



                            <td>
                                <div>
                                    <a href="{{ url('pengguna/'.$d->id.'/edit') }}" class="btn btn-success"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="{{ url('hapuspengguna/'.$d->id) }}" class="btn btn-danger"><i
                                            class="fas fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
