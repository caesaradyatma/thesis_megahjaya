@extends('layouts.app')
@include('includes.navbar')
@section('content')
<div class="container">
    <div class="row">
        {{-- <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="incomes" class="btn btn-primary">Lihat Pendapatan</a>
                    <a href="incomes" class="btn btn-primary">Lihat Pengeluaran</a>
                </div>
            </div>
        </div> --}}

        <div class="col-md-12">
          <div class="col-md-12">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3 class="panel-title">Penjualan</h3>
              </div>
              <div class='panel-body'>
                <p>Pendapatan dari Penjualan</p>
                <h2>Rp {{number_format($totSales)}}</h2>
                <a href="invoices" class="btn btn-primary">Lihat List Invoice</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Pemasukan</h3>
              </div>
              <div class="panel-body">
                <p>Total Uang Masuk</p>
                <h2>Rp {{number_format($totIncomes)}}</h2>
                <a href="incomes" class="btn btn-primary">Lihat List Pendapatan</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Pengeluaran</h3>
              </div>
              <div class="panel-body">
                <p>Total Pengeluaran</p>
                <h2>Rp {{number_format($totOutcomes)}}</h2>
                <a href="outcomes" class="btn btn-primary">Lihat List Pengeluaran</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Piutang</h3>
              </div>
              <div class="panel-body">
                <p>Total Piutang</p>
                <h3>Rp {{number_format($totPiutang)}}</h3>
                <a href="piutangs" class="btn btn-primary">Lihat List Piutang</a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Utang</h3>
              </div>
              <div class="panel-body">
                <p>Total Utang</p>
                <h3>Rp {{number_format($totUtang)}}</h3>
                <a href="utangs" class="btn btn-primary">Lihat List Utang</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
          <div class="col-sm-12">
            <div class="panel panel-success">
              <div class="panel-heading">
                <h3>Balance</h3>
              </div>
              <div class="panel-body">
                <h2>Rp {{number_format($balance)}}</h2>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
