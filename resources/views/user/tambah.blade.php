@extends('layouts.main')
@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title m-0 font-weight-bold text-primary">Tambah Data User</h4>
        </div>
        <div class="card-body">
            <form class="forms-sample" action="/user/insert" method="POST">
                @csrf
                <div class="form-group">
                    <label for="1">Nama</label>
                    <input type="text" class="form-control" id="1" placeholder="Name" name="name">
                </div>
                <div class="form-group">
                    <label for="2">Role</label>
                    <select class="form-control" id="2" name="role">
                        <option value="1">Admin</option>
                        <option value="2">Pengguna</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="4">Email</label>
                    <input type="email" class="form-control" id="4" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label for="5">Password</label>
                    <input type="password" class="form-control" id="5" placeholder="Password" name="password">
                </div>
                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <a href="/user" class="btn btn-light">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
