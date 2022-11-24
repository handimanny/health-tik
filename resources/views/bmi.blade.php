@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('BMI') }}</div>

                <div class="card-body">

                <div class="container">
                    <div class="row">
                        <div class="col">
                
                            <form action="{{ url('bmi') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Hobi</label>
                                    <div class="form-control">
                                        <input type="text" name="hobi">
                                        <input type="text">
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" class="form-control" name="tahun">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Berat Badan</label>
                                    <input type="number" class="form-control" name="berat">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Tinggi Badan</label>
                                    <input type="number" class="form-control" name="tinggi">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                
                            <table class="table mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">nama</th>
                                        <th scope="col">hobi</th>
                                        <th scope="col">umur</th>
                                        <th scope="col">bmi</th>
                                        <th scope="col">obes</th>
                                        <th scope="col">konsultasi</th>
                                        <th scope="col">aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @isset($data)
                                        <td>{{ $data['nama'] }}</td>
                                        <td>{{ $data['hobi'] }}</td>
                                        <td>{{ $data['tahun'] }}</td>
                                        <td>{{ $data['bmi'] }}</td>
                                        <td>{{ $data['obes']}}</td>
                                        <td>konsultasi</td>
                                        <td><a href="bmi" class="btn btn-danger" >Hapus</a></td>
                                        @endisset
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
