@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Artikel/Edit</div>

                <div class="card-body">
                    
                <form action="{{url('artikel/'.$data->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                <div class="mb-3">
                    <label for="judul" class="form-label @error('judul') is-invalid @enderror">Edit Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" value="{{$data->judul}}">
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Edit Foto</label>
                    @if($data->foto)
                    <img src="{{ asset('storage/'.$data->foto) }}" alt="" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                    @else
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    @endif
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label @error('isi') is-invalid @enderror">Edit Isi</label>
                    <input type="text" class="form-control" name="isi" id="isi" placeholder="Input Isi" value="{{$data->isi}}">
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_artikel" class="form-label @error('tgl_artikel') is-invalid @enderror">Edit Tanggal</label>
                    <input type="date" class="form-control" name="tgl_artikel" id="tgl_artikel" placeholder="Input Tanggal" value="{{$data->tgl_artikel}}">
                    @error('tgl_artikel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="kategori_id" class="form-label">Edit Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected ( $data->kategori_id==$file->id )>{{$file->nama_kategori}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                <label for="user_id" class="form-label">Edit Penulis</label>
                <select class="form-control" id="user_id" name="user_id">
                    @foreach ($user as $file)
                    <option value="{{$file->id}}" @selected ( $data->user_id==$file->id )>{{$file->name}}</option>
                    @endforeach
                </select>
                </div>
                <button type="submit" class="btn btn-outline-primary">Submit</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
