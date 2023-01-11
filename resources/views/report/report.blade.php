@extends('layouts.main')
@section('title', 'Tabel Laporan')

@section('content')
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
                <div  style="margin-left: 64vw;">

                    <button type="button" class="btn btn-primary mt-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Tanggal</button>
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
                                                <th>Hasil</th>
                                                {{-- <th>Prices</th>
                                                <th>Total</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $grand = 0;
                                                $income= 0;
                                                $outcome = 0;
                                            @endphp
                                            @foreach($transaction as $row)
                                            <tr>
                                                <td>{{ $row->tanggal }}</td>
                                                <td>{{ $row->keterangan }}</td>
                                                <td>{{ "Rp " . number_format($row->income->jumlah_pemasukan,0,',','.') }}</td>
                                                <td>{{ "Rp " . number_format($row->outcome->jumlah_pengeluaran,0,',','.') }}</td>
                                                <td>{{ "Rp " . number_format($row->hasil,0,',','.') }}</td>
                                            </tr>
                                            @php
                                                $grand += $row->hasil;
                                                $income += $row->income->jumlah_pemasukan;
                                                $outcome += $row->outcome->jumlah_pengeluaran;
                                            @endphp
                                            
                                            @endforeach
                                            <tr>
                                                <td colspan="2" class="text-center"><strong>Grand Total</strong></td>
                                                <td><strong>{{ "Rp " . number_format($income,0,',','.') }}</strong></td>
                                                <td><strong>{{ "Rp " . number_format($outcome,0,',','.') }}</strong></td>
                                                <td><strong>{{ "Rp " . number_format($grand,0,',','.') }}</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
        <div class="dropdown">
            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Export
            </button>
    <ul class="dropdown-menu">
        <li><a href="{{route('pdf-report')}}" type="button" class="dropdown-item">Export PDF</a></li>
        <li><a href="" type="button" class="dropdown-item">Export EXCEL</a></li>
    </ul>
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
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Filter Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form role="form" method="GET" action="/filtertransaction">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dari Tanggal</label>
                            <input type="date" class="form-control date-picker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sampai Tanggal</label>
                            <input type="date" class="form-control datepicker" id="exampleInputPassword1"
                            placeholder="Sampai Tanggal" name="sampai" value="{{ date('Y-m-d') }}">
                        </div>
                    
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection