@extends('layouts.main')

@section('title', 'Edit Data Kategori')

@section('content')
<h1 class="text-center mt-4">Edit Data Kategori</h1>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-body">
                    <form action="/transaction/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Kategori</label>
                            <input type="text" name="kategori" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->kategori }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection