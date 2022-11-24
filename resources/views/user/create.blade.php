@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Kategori</div>

                <div class="card-body">
                    
                <form action="{{url('artikel')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="mb-3">
                    <label for="judul" class="form-label @error('judul') is-invalid @enderror">Tambah Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" placeholder="Input Judul" >
                    @error('judul')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Tambah Foto</label>
                    <img class="img-preview img-fluid mb-3 col-sm-5" >
                    <input class="form-control" type="file" id="foto" name="foto" onchange="previewImage()">
                </div>
                <div class="mb-3">
                    <label for="isi" class="form-label @error('isi') is-invalid @enderror">Tambah Isi</label>
                    <input type="text" class="form-control" name="isi" id="isi" placeholder="Input Isi" >
                    @error('isi')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_artikel" class="form-label @error('tgl_artikel') is-invalid @enderror">Tambah Tanggal</label>
                    <input type="date" class="form-control" name="tgl_artikel" id="tgl_artikel" placeholder="Input Tanggal" >
                    @error('tgl_artikel')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="mb-3">
                <label for="kategori_id" class="form-label">Tambah Kategori</label>
                <select class="form-control" id="kategori_id" name="kategori_id">
                    <option selected>Klik untuk milih</option>
                    @foreach ($kategori as $file)
                    <option value="{{$file->id}}" @selected(old('kategori_id')==$file->id)>{{$file->nama_kategori}}</option>
                    @endforeach
                </select>
                </div>
                <div class="mb-3">
                <label for="user_id" class="form-label">Penulis</label>
                <select class="form-control" id="user_id" name="user_id">
                    <option selected>Klik untuk milih</option>
                    @foreach ($user as $file)
                    <option value="{{$file->id}}" @selected(old('user_id')==$file->id)>{{$file->name}}</option>
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
