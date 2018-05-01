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
            <th>Sales</th>
            <td></td>
            <td>{{number_format($totSales)}}</td>
          </tr>
          {{-- <tr>
            <td style="padding-left:30px;">Accounts Receivable</td>
            <td style="text-align:right;">{{number_format($totPiutangs)}}</td>
            <td></td>
          </tr> --}}
          <tr>
            <th>Cost of Goods Sold</th>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:50px;">Opening Inventories</td>
            <td>isi disini</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:50px;">Purchased Inventories</td>
            <td>isi disini</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:50px;">Closing Inventories</td>
            <td>isi disini</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td>(Total COGS)</td>
          </tr>
          <tr>
            <th>Gross Profit</th>
            <td></td>
            <td>{{number_format($totIncomes)}}</td>
            <td>
          </tr>
          <tr>
            <th colspan="3">Operating Expenses</th>
          </tr>
          <tr>
            {{-- @foreach ($costs as $cost)
              <td style="padding-left:30px;">{{$cost->out_name}}</td>
              <td style="text-align:right;">{{number_format($cost->out_amount)}}</td>
              <td></td>
            @endforeach --}}
            <td style="padding-left:30px;">Utilities</td>
            <td>{{number_format($totCosts)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:30px;">Salaries</td>
            <td>isi disini</td>
            <td></td>
          </tr>
          {{-- <tr>
            <td style="padding-left:30px;">Accounts Payable</td>
            <td style="text-align:right;">{{number_format($totUtangs)}}</td>
            <td></td>
          </tr> --}}
          <tr>
            <th></th>
            <td></td>
            <td>({{number_format($totExpenses)}})</td>
          </tr>
          <tr>
            <th>Operating Income</th>
            <td></td>
            <td>{{number_format($totIncomes-$totExpenses)}}</td>
          </tr>
          <tr>
            <th>Income Before Tax</th>
            <td></td>
            <td>isi disini</td>
          </tr>
          <tr>
            <td>Income Tax</td>
            <td></td>
            <td>(isi disini)</td>
          </tr>
          <tr>
            <th>Net Profit</th>
            <td></td>
            <td>isi disini</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
