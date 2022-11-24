@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pengguna</div>

                <div class="card-body">
                    
                <!-- <a href="artikel/create" class="btn btn-outline-primary" >Tambah Artikel</a> -->
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Email</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $file)
                        <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        <td>{{$file['name']}}</td>
                        <td>{{$file['email']}}</td>
                        <td>{{$file['role']}}</td>
                        <td>
                        <a href="{{url('user/'.$file->id.'/edit')}}" class="btn btn-outline-success" >Edit</a>
                        |
                        <a href="{{url('deleteuser/'.$file->id)}}" class="btn btn-outline-danger" >Hapus</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
