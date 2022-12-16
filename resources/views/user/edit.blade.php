@extends('layouts.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title m-0 font-weight-bold text-primary">Tambah Data Fasilitas Kamar</h4>
        </div>
        <div class="card-body">
            <form action="/user/update/{{ $data->id }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->name }}">
                        </div>
                        <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control @error('role') is-invalid @enderror"
                        aria-label="Default select example" id="role" name="role" value="{{ $data->role}}">
                        <option value="1">Admin</option>
                        <option value="2">Pengguna</option>
                    </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->password }}">
                        </div>
                        <button type="submit" class="btn btn-primary float-right" id="editButton">Submit</button>
                        <a href="/user" class="btn btn-light">Cancel</a>
                    </form>
        </div>
    </div>
</div>
@endsection
