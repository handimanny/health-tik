@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Halaman') }}</div>

                <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="col">

                        <div class="container">
                            <div class="row">
                                @foreach ($data as $file)
                                <div class="col-lg-4 mt-2">
                                    <div class="card">
                                        <div style="max-height:100px; overflow:hidden;" >
                                            <img src="{{ asset('storage/'. $file->foto) }}" class="card-img-top" alt="">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $file->judul }}</h5>
                                            <h5 class="card-text">{{$file->kategori->nama_kategori}}</h5>
                                            <p class="card-text">{{ $file->tgl_artikel }}</p>
                                            <p class="card-text">{{ $file->user->name }}</p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
