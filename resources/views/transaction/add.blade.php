@extends('layouts.main')

@section('title', 'Tambah Transaksi')

@section('content')

<div class="container">
    <h1 class="text-center mb-4 mt-4">Tambah Transaksi</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%;">
                    <form action="/transaction/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Tanggal</label>
                            <input type="date" name="tanggal" class="form-control">
                            @error('tanggal')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <select class="form-select" name="category_id" id="room_id">
                                @foreach ($category as $row)
                                <option value="{{ $row->id }}">{{ $row->kategori }}</option>
                                @endforeach
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                            @error('keterangan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pemasukan</label>
                            <select class="form-select" name="income_id" id="room_id">
                                @foreach ($income as $row)
                                <option value="{{ $row->id }}">{{ $row->jumlah_pemasukan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Pengeluaran</label>
                            <select class="form-select" name="outcome_id" id="room_id">
                                @foreach ($outcome as $row)
                                <option value="{{ $row->id }}">{{ $row->jumlah_pengeluaran }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="submitButton">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection