@extends('template')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h1>Edit Pengguna</h1>
            <form action="{{  url('pengguna/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Nama Pengguna </label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                        value="{{ $data->name }}" name="name">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Email </label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                        value="{{ $data->email }}" name="email">
                </div>
            

                <div class="form-row ml-1">
                <div class="form-group">
                     <label for="exampleInputPassword1" class="form-label">Jabatan</label>
                    <div class="form-radio">
                        <input class="form-radio" name="jabatan" type="radio" value="admin" {{ $data->jabatan == 'admin' ? 'checked' : '' }} id="form-radio">
                        <label class="form-check-label mr-3" for="form-radio">
                            admin
                        </label>
                        <input class="form-radio" name="jabatan" type="radio" value="user" {{ $data->jabatan == 'user' ? 'checked' :'' }} id="form-radio">
                        <label class="form-check-label" for="form-radio">
                            pengguna
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
