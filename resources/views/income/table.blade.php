@extends('layouts.main')
@section('title', 'Tabel Pemasukan')

@section('content')
<h1 class="mt-3" style="margin-left: 23px">Data Pemasukan</h1>

<div class="container mt-3">
    <div class="bungkus d-flex mb-4">
        <a href="{{route('add-income')}}" type="button" class="btn btn-primary">+ Tambah</a>

        <div class="row g-3" style="margin-left: 54vw; ">
            <div class="col-auto">
                <form action="/income" method="GET">
                    <input type="search" id="inputPassword6" name="search" class="form-control"
                        aria-describedby="passwordHelpInline" placeholder="Search...">
                </form>
                <button type="button" class="btn btn-primary btn-sm px-5 mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tanggal</button>
            </div>
        </div>
    </div>

    <section class="section">
        <div class="card mt-2">
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-hover' id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                {{-- <th scope="row">{{ $index + $kategoris->firstItem() }}</th> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->tanggal }}</td>
                                <td>{{ $row->keterangan }}</td>
                                <td>{{ $row->jumlah_pemasukan }}</td>
                                <td>
                                    <a href="/income/form-edit/{{ $row->id }}" class="text-warning">
                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm-1-5L14 5l3 3L7 18H4v-3zM15 4l2-2l3 3l-2.001 2.001L15 4z"
                                                    fill="currentColor" fill-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                    <a href="#" class="btn btn-icon rounded-circle btn-outline-danger delete"
                                        data-id="{{ $row->id }}" data-keterangan="{{ $row->keterangan }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em"
                                            viewBox="0 0 24 24">
                                            <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M3 6h18" />
                                                <path
                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                            </g>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <br>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
<a href="/income" type="button" class="mt-4" style="margin-left: 24px">
<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill: rgba(86, 106, 127, 1);transform: ;msFilter:;"><path d="M21 11H6.414l5.293-5.293-1.414-1.414L2.586 12l7.707 7.707 1.414-1.414L6.414 13H21z"></path></svg>
</a>
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Date</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="/filterincome">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tanggal</label>
                            <input type="date" class="form-control date-picker" id="exampleInputEmail1" placeholder="" name="sampai" value="{{ date('Y-m-d') }}">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary mt-1">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js"
    integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
    $('.delete').click(function () {
        var databaseid = $(this).attr('data-id');
        var keteranganid = $(this).attr('data-keterangan');
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this imaginary file! Id: " +
                    databaseid + " Keterangan: " + keteranganid + "",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/income/delete/" + databaseid + ""
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
