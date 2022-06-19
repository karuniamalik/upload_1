@extends('template')

@section('main')
<div class="container-fluid">
    <div class="row">
        <div class="col">

            <h1>Edit Kategori</h1>
            <form action="{{  url('kategori/'.$data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Kategori </label>
                    <input type="text" class="form-control @error('kategori') is-invalid @enderror"
                        value="{{ $data->kategori }}" name="kategori">
                </div>
            

                <div class="form-row ml-1">
                <div class="form-group">
                     <label for="exampleInputPassword1" class="form-label">Status</label>
                    <div class="form-radio">
                        <input class="form-radio" name="status" type="radio" value="{{ $data->status }}" id="form-radio">
                        <label class="form-check-label mr-3" for="form-radio">
                            On
                        </label>
                        <input class="form-radio" name="status" type="radio" value="{{ $data->status }}" id="form-radio">
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
