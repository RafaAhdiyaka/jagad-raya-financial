@extends('layouts.main')
@section('content')
{{-- <div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="/assets/img/icons/unicons/chart-success.png" alt="chart success"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Pemasukan</span>
                            <h3 class="card-title mb-2">Rp.1.000.000</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="/assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Pengeluaran</span>
                            <h3 class="card-title mb-2">Rp.250.000</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Total Revenue -->
        <!--/ Total Revenue -->
        <div class="col-lg-4 col-md-4 order-1">
            <div class="row">
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="/assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                                </div>
                            </div>
                            <span class="d-block mb-1">Saldo</span>
                            <h3 class="card-title text-nowrap mb-2">Rp.75.500.000</h3>
                        </div>
                    </div>
                </div>
                <div class="col-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="/assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                        class="rounded" />
                                </div>
                            </div>
                            <span class="fw-semibold d-block mb-1">Transaksi</span>
                            <h3 class="card-title mb-2">Rp.1.250.000</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div> --}}
<div class="row mt-5">
    <div class="col-md-3">
        <div class="card card-body mb-3">
            <label>Jumlah Pemasukan</label>
            <h1>{{ $totalIncome }}</h1>
            <a href="{{ url('income') }}" class="text-dark">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body mb-3">
            <label>Jumlah Pemasukan</label>
            <h1>{{ $todayIncome }}</h1>
            <a href="{{ url('income') }}" class="text-dark">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body mb-3">
            <label>Jumlah Pemasukan</label>
            <h1>{{ $thisMonthIncome }}</h1>
            <a href="{{ url('income') }}" class="text-dark">View</a>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card card-body mb-3">
            <label>Jumlah Pemasukan</label>
            <h1>{{ $thisYearIncome }}</h1>
            <a href="{{ url('income') }}" class="text-dark">View</a>
        </div>
    </div>
</div>

@endsection

