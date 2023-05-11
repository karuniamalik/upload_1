@extends('template')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h1>Edit Kategori</h1>
                <form action="{{ url('kategori/' . $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kategori </label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                            value="{{ $data->kategori }}" name="kategori">
                    </div>

                    <select class="form-select mb-3" aria-label="Default select example" name="jenis_kategori">
                        <option selected>Jenis Kategori</option>
                        <option value="Pakaian Atasan" {{ $data->jenis_kategori == 'Pakaian Atasan' ? 'selected' : '' }}>
                            Pakaian Atasan</option>

                        <option value="Pakaian Bawahan" {{ $data->jenis_kategori == 'Pakaian Bawahan' ? 'selected' : '' }}>
                            Pakaian Bawahan</option>

                        <option value="Warna" {{ $data->jenis_kategori == 'Warna' ? 'selected' : '' }}>
                            Warna</option>

                    </select>


                    <div class="form-row ml-1">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <div class="form-radio">
                                <input class="form-radio" name="status" type="radio" value="on"
                                    {{ $data->status == 'on' ? 'checked' : '' }} id="form-radio">
                                <label class="form-check-label mr-3" for="form-radio">
                                    On
                                </label>
                                <input class="form-radio" name="status" type="radio" value="off"
                                    {{ $data->status == 'off' ? 'checked' : '' }} id="form-radio">
                                <label class="form-check-label" for="form-radio">
                                    Off
                                </label>
                            </div>
                        </div>

                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

    </div>
@endsection
