@extends('layouts.main')
@section('content')

<div class="container mt-4">
    <div class="row">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pemasukan</h5>
            <p class="card-text">Some text</p>
            <a href="/income" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengeluaran</h5>
            <p class="card-text">Some text</p>
            <a href="/outcome" class="btn btn-primary">View</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  




<!-- CSS -->
<link rel="stylesheet" href="{{ asset('css/app.css') }}">

<!-- JS -->
<script src="{{ asset('js/app.js') }}" defer></script>

@endsection

