@extends('layouts.main')

@section('title', 'Tambah Pengeluaran')

@section('content')

<div class="container">
    <h1 class="text-center mb-4 mt-4">Tambah Pengeluaran</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%;">
                    <form action="/outcome/insert" method="POST" enctype="multipart/form-data">
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
                            <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control">
                            @error('keterangan')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                            <input type="text" name="jumlah_pengeluaran" class="form-control">
                            @error('jumlah_pengeluaran')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="submitButton">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection