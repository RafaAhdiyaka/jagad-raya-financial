@extends('layouts.main')

@section('title', 'Tambah Kategori')

@section('content')

<div class="container">
    <h1 class="text-center mb-4 mt-4">Tambah Kategori</h1>
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body" style="width: 90%;">
                    <form action="/category/insert" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control">
                            @error('kategori')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection