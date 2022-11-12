@extends('layouts.main')

@section('title', 'Edit Data Transaksi')

@section('content')
<h1 class="text-center mt-4">Edit Data Transaksi</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="/transaction/update/{{ $transaksi->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $transaksi->tanggal }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select class="form-select" name="kategori_id" id="room_id">
                                @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                @endforeach
                            </select>       
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $transaksi->keterangan }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pemasukan</label>
                            <select class="form-select" name="jumlah_pemasukan_id" id="room_id">
                                @foreach ($income as $row)
                                <option value="{{ $row->id }}">{{ $row->jumlah_pemasukan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pengeluaran</label>
                            <select class="form-select" name="jumlah_pengeluaran_id" id="room_id">
                                @foreach ($outcome as $row)
                                <option value="{{ $row->id }}">{{ $row->jumlah_pengeluaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="editButton">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection