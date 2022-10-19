@extends('layouts.main')

@section('title', 'Edit Data Transaksi')

@section('content')
<h1 class="text-center mt-4">Edit Data Transaksi</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="/transaction/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <input type="text" name="category_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->category_id }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->keterangan }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pemasukan</label>
                            <input type="text" name="jumlah_pemasukan_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->jumlah_pemasukan_id }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pengeluaran</label>
                            <input type="text" name="jumlah_pengeluaran_id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->jumlah_pengeluaran_id }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="editButton">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection