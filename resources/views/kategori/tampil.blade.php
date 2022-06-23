@extends('template')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h1>Data kategori</h1>
            <div class="mt-3">
                <a href="kategori/create" class="btn btn-primary mb-3"> Tambah Data</a>

                <table class="table table-striped " id="">
                    <thead>
                        <tr>
                            <th>Nama Kategori</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($data as $d)

                        <tr>
                            <td>{{ $d->kategori }}</td>
                            <td>{{$d->status }}</td>
                            <td>{{$d->created_at }}</td>

                            <td>
                                <div>
                                    <a href="{{ url('kategori/'.$d->id.'/edit') }}" class="btn btn-success"><i
                                            class="fas fa-pen"></i></a>
                                    <a href="{{ url('hapuskategori/'.$d->id) }}" class="btn btn-danger"><i
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
