@extends('template')

@section('main')
    <div class="container-fluid">
        <div class="row">
            <div class="col">

                <h1>Tambah Kategori</h1>
                <form action="{{ route('kategori.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Kategori </label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                            value="{{ old('kategori') }}" name="kategori">
                    </div>

                    <select class="form-select mb-3" aria-label="Default select example" name="jenis_kategori">
                        <option selected>Jenis Kategori</option>
                        <option value="Pakaian Atasan">Pakaian Atasan</option>
                        <option value="Pakaian Bawahan">Pakaian Bawahan</option>
                        <option value="Warna">Warna</option>
                    </select>

                    <div class="form-row ml-1">
                        <div class="form-group">
                            <label for="exampleInputPassword1" class="form-label">Status</label>
                            <div class="form-radio">
                                <input class="form-radio" name="status" value="on" type="radio" id="form-radio">
                                <label class="form-check-label mr-3" for="form-radio">
                                    On
                                </label>
                                <input class="form-radio" name="status" value="off" type="radio" id="form-radio">
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
