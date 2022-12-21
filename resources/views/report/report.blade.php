@extends('layouts.main')
@section('title', 'Tabel Laporan')

@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container mt-5">
                {{-- <a href="/" class="btn btn-warning ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                        class="bi bi-caret-left-fill" viewBox="0 0 16 16">
                        <path
                            d="m3.86 8.753 5.482 4.796c.646.566 1.658.106 1.658-.753V3.204a1 1 0 0 0-1.659-.753l-5.48 4.796a1 1 0 0 0 0 1.506z" />
                    </svg>
                    <span>Go Back</span>
                </a> --}}
                <div class="row p-3">
                    <h1 class="text-center ">Laporan</h1>
                    <div class="col d-flex ">
                        {{-- <img src="" alt="" style="width: 120px;"> --}}
                        <h4 class="mt-5 ms-2">Jagad Raya</h4>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- info row -->

                                <div class="col-sm-3 invoice-col">
                                    <b class="fs-5">USER DETAIL</b><br>
                                    <b>Name:</b> {{ auth()->user()->name }}<br>
                                    <b>Email:</b> {{ auth()->user()->email }}<br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row ">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Keterangan</th>
                                                <th>Pemasukan</th>
                                                <th>Pengeluaran</th>
                                                {{-- <th>Prices</th>
                                                <th>Total</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($transaction as $row)
                                            <tr>
                                                <td>{{ $row->tanggal }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                                <td>{{ $row->income->jumlah_pemasukan }}</td>
                                                <td>{{ $row->outcome->jumlah_pengeluaran }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12 ">
                                    <a href="/invoice-print" rel="noopener" target="_blank"
                                        class="btn btn-default float-right"></i> Print</a>

                                    <button type="button" class="btn btn-primary float-right"
                                        style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    </div>
</body>

</html>
@endsection