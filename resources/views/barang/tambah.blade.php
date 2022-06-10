@extends('template')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h1>Tambah Barang</h1>
            <form action="{{ route('barang.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Barang </label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                        value="{{ old('nama_barang') }}" name="nama_barang">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">spesifikasi</label>
                    <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror"
                        value="{{ old('spesifikasi') }}" name="spesifikasi">
                </div>
                <div class="mb-3">
                      {{-- @foreach ($data as $item) --}}
                    <label for="exampleInputPassword1" class="form-label">gambar</label>
                   <input type="file" name="gambar" class="form-control-file" >
                    {{-- <img class="img-thumbnail" src="storage/{{ $item->gambar }}" alt="k"> --}}
                   {{-- @endforeach --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                        value="{{ old('harga') }}" name="harga">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror"
                        value="{{ old('stok') }}" name="stok">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    {{-- <input type="text" class="form-control @error('status') is-invalid 
                    
                    @enderror"  value="{{ old('status') }}" name="status"> --}}
                    <select class="custom-select" name="status">
                        <option selected>Pilih Status</option>
                        <option value="on">On</option>
                        <option value="off">Off</option>

                    </select>



                </div>
                <div class="mb-3">
                    {{-- <label for="exampleInputPassword1" class="form-label">kategori</label>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror"  value="{{ old('kategori') }}"
                    name="kategori_id"> --}}

                    <select class="custom-select " name="kategori_id">

                        <option selected>Pilih Kategori</option>
                        @foreach ($kategori as $ktgr)
                        <option value="{{ $ktgr->id }}">{{ $ktgr->kategori }}</option>

                        @endforeach
                    </select>


                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection
