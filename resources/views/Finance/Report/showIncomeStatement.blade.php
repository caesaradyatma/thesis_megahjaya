@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
    <div class='row'>
      <div class="col-sm-12">
        <h1>TOKO MEGAH JAYA INCOME STATEMENT</h1>
        <h3>Tanggal</h3>
        <hr>
      </div>
      {{-- <div class="col-sm-12">
        <h3>Revenue:</h3>
      </div>
      <div class="col-sm-6">
        <h4 style="margin-left:20px;">Sales</h4>
        <h4 style="margin-left:20px;">Accounts Receivables</h4>
      </div>
      <div class="col-sm-3">

      </div>
      <div class="col-sm-3">
        <h4>{{number_format($totRevenues)}}</h4>
        <h4>{{number_format($totPiutangs)}}</h4>
      </div> --}}
      <div class="col-sm-12">
        <table class="table">
          <tr>
            <th colspan="3">Revenue</th>
          </tr>
          <tr>
            <td style="padding-left:30px;">Sales</td>
            <td style="text-align:right;">{{number_format($totSales)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:30px;">Accounts Receivable</td>
            <td style="text-align:right;">{{number_format($totPiutangs)}}</td>
            <td></td>
          </tr>
          <tr>
            <th>Total Revenue</th>
            <td></td>
            <td>{{number_format($totPiutangs + $totSales)}}</td>
            <td>
          </tr>
          <tr>
            <th colspan="3">Expenses</th>
          </tr>
          <tr>
            @foreach ($costs as $cost)
              <td style="padding-left:30px;">{{$cost->out_name}}</td>
              <td style="text-align:right;">{{number_format($cost->out_amount)}}</td>
              <td></td>
            @endforeach
          </tr>
          <tr>
            <td style="padding-left:30px;">Accounts Payable</td>
            <td style="text-align:right;">{{number_format($totUtangs)}}</td>
            <td></td>
          </tr>
          <tr>
            <th>Total Expenses</th>
            <td></td>
            <td>{{number_format($totUtangs+$totCosts)}}</td>
          </tr>
          <tr>
            <th>Net Income</th>
            <td></td>
            <td>{{number_format($totIncomes-$totExpenses)}}</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
