@extends('layouts.main')

@section('title', 'Edit Data Pemasukan')

@section('content')
<h1 class="text-center mt-4">Edit Data Pemasukan</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="/income/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->keterangan }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="text" id="dengan-rupiah" name="jumlah_pemasukan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->jumlah_pemasukan }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="editButton">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection