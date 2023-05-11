@extends('template')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h1>Data barang</h1>
                <a href="barang/create " class="btn btn-primary mb-3"> Tambah Data</a>

                <form action="" class="form-inline">
                    <input type="date" id="awal" class="form-control">
                    <input type="date" id="akhir" class="form-control mx-2">
                    <input type="button" id="input" class="btn btn-success" value="cari">
                    <input type="button" id="reset" class="btn btn-success" value="reset">
                    <a href="{{ url('export') }}" class="btn btn-success">Export</a>

                </form>

                <table class="table table-striped " id="tabeldata">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Gambar</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Status</th>
                            {{-- <th>Kategori</th> --}}
                            <th>Tanggal</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    {{-- <tbody>
                    @foreach ($data as $d)

                    <tr>
                        <td>{{ $d->nama }}</td>
                        <td>{{$d->alamat }}</td>
                        <td>{{ $d->usia }}</td>
                        <td>{{$d->nohp }}</td>
                        <td>{{$d->sekolah_id }}</td>
                        <td>{{$d->created_at }}</td>

                        <td>
                            <div>
                                <a href="{{ url('siswa/'.$d->id.'/edit') }}" class="btn btn-success"><i class="fas fa-pen"></i></a>
                                <a href="{{ url('hapussiswa/'.$d->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody> --}}
                </table>
            </div>
        </div>
    </div>
@endsection
