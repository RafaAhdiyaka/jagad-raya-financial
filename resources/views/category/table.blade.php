@extends('layouts.main')
@section('title', 'Tabel Kategori')

@section('content')
<h1 class="mt-3" style="margin-left: 23px">Data Kategori</h1>

<div class="container mt-3">
    <div class="bungkus d-flex mb-4">
        <div class="row g-1">
            <a href="{{route('add-category')}}" type="button" class="btn btn-primary">+ Tambah</a>
            <div class="dropdown">
                <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Export
                </button>
                <ul class="dropdown-menu">
                <li><a href="{{route('pdf-category')}}" type="button" class="dropdown-item">Export PDF</a></li>
                <li><a href="" type="button" class="dropdown-item">Export EXCEL</a></li>
                </ul>
            </div>
        </div>
    
        <div class="row g-3" style="margin-left: 54vw; ">
            <form action="/category" method="GET">
                <input type="search" id="inputPassword6" name="search" class="form-control" aria-describedby="passwordHelpInline" placeholder="Search...">
            </form>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class='table table-hover' id="table1">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $row)
                            <tr>
                                {{-- <th scope="row">{{ $index + $kategoris->firstItem() }}</th> --}}
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->kategori }}</td>
                                <td>
                                    <a href="/category/form-edit/{{ $row->id }}" class="text-warning">
                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-warning">
                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em" viewBox="0 0 24 24">
                                                <path d="M5 20h14a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2zm-1-5L14 5l3 3L7 18H4v-3zM15 4l2-2l3 3l-2.001 2.001L15 4z" fill="currentColor" fill-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </a>
                                    {{-- <a href="/category/delete/{{ $row->id }}" class="btn btn-danger delete">
                                        <button type="button" class="btn btn-icon rounded-circle btn-outline-danger"  id="deleteButton">
                                            <svg xmlns="http://www.w3.org/2000/svg" role="img" width="1em" height="1em" viewBox="0 0 24 24">
                                                <g fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M3 6h18" />
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" />
                                                </g>
                                            </svg>
                                        </button>
                                        delete
                                    </a> --}}
                                    <a href="#" class="btn btn-icon rounded-circle btn-outline-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->kategori }}">
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
                    <br>
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.1.slim.js" integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
<script>
    $('.delete').click( function(){
      var databaseid = $(this).attr('data-id'); 
      var kategoriid = $(this).attr('data-nama'); 
    swal({
    title: "Are you sure?",
    text: "Once deleted, you will not be able to recover this imaginary file! Id: "+databaseid+" Kategori: "+kategoriid+"",
    icon: "warning",
    buttons: true,
    dangerMode: true,
    })
    .then((willDelete) => {
    if (willDelete) {
      window.location = "/category/delete/"+databaseid+""
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