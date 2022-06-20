@extends('template')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h1>Edit data</h1>
            <form action="{{ url('barang/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Barang </label>
                    <input type="text" class="form-control @error('nama_barang') is-invalid @enderror"
                        value="{{ $data->nama_barang }}" name="nama_barang">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Spesifikasi</label>
                    <input type="text" class="form-control @error('spesifikasi') is-invalid @enderror"
                        value="{{ $data->spesifikasi  }}" name="spesifikasi">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Gambar</label>
                    <input type="file" name="gambar" class="form-control-file" value="{{ $data->gambar }}" >
                    {{-- <input type="text" class="form-control @error('gambar') is-invalid @enderror"  value="{{ $data->gambar  }}"
                    name="gambar"> --}}
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Harga</label>
                    <input type="text" class="form-control @error('harga') is-invalid @enderror"
                        value="{{ $data->harga  }}" name="harga">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Stok</label>
                    <input type="text" class="form-control @error('stok') is-invalid @enderror"
                        value="{{ $data->stok  }}" name="stok">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Status</label>
                    {{-- <input type="text" class="form-control @error('status') is-invalid 
                    
                    @enderror"  value="{{ old('status') }}" name="status"> --}}
                    <select class="custom-select" name="status" >
                        <option selected>Pilih Status</option>
                        <option value="on" {{ $data->status == 'on' ? 'selected' : ''  }}>On</option>
                        <option value="off" {{ $data->status == 'off' ? 'selected' : ''  }}>Off</option>
                    </select>

                </div>

                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">kategori</label>
                    {{-- <input type="text" class="form-control @error('kategori') is-invalid @enderror"  value="{{ old('kategori') }}"
                    name="kategori_id"> --}}

                    <select class="custom-select " name="kategori_id">

                        <option selected>Pilih Kategori</option>
                        @foreach ($kategori as $ktgr)
                        <option value="{{ $ktgr->id }}"  {{  $ktgr->id == $ktgr->id ? 'selected' : '' }}>{{ $ktgr->kategori }}</option>

                        @endforeach
                    </select>


                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</div>
@endsection
