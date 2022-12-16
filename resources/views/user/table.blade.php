@extends('layouts.main')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card shadow">
        <div class="card-header">
            <h4 class="card-title m-0 font-weight-bold text-primary">Data User</h4>
        </div>
        <div class="card-body">
            <p class="card-description">
                <a href="/user/add" class="btn btn-primary btn-sm float-right rounded-3">Tambah Data</a>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->role }}</td>
                            {{-- <td>{{ $row->username }}</td> --}}
                            <td>{{ $row->email }}</td>
                            {{-- <td>{{ $row->password }}</td> --}}
                            <td>
                                    <a href="/user/form-edit/{{ $row->id }}" class="text-warning">
                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em" viewBox="0 0 24 24">
                                                <path d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm-1-5L14 5l3 3L7 18H4v-3zM15 4l2-2l3 3l-2.001 2.001L15 4z" fill="currentColor" fill-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="#" class="btn btn-icon rounded-circle btn-outline-danger delete" data-id="{{ $row->id }}" data-tanggal="{{ $row->tanggal }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em" viewBox="0 0 24 24">
                                                    <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M3 6h18" />
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                    </g>
                                                </svg>
                                    </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js"
    integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
    $('.delete').click(function () {
        var databaseid = $(this).attr('data-id');
        // var nameid = $(this).attr('data-name');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file! Id: " +
                    databaseid + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/user/delete/" + databaseid + ""
                    swal("Poof! Your imaginary file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    });

</script>
@endsection
