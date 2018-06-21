@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
    <div class='row'>
      <div class="col-sm-12">
        <h1>Laporan Laba Rugi Toko Bangunan Megah Jaya</h1>
        <h3>Periode {{$year}}</h3>
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
            <td>{{number_format($open_inventory)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:50px;">Purchased Inventories</td>
            <td>{{number_format($totPurchased)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:50px;">Closing Inventories</td>
            <td>{{number_format($close_inventory)}}</td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td><?php echo "( ".number_format($open_inventory + $totPurchased - $close_inventory)." )";?></td>
          </tr>
          <tr>
            <th>Gross Profit</th>
            <td></td>
            <td>
              <?php
                $gross_profit = $totSales - ($open_inventory + $totPurchased - $close_inventory);
                echo number_format($gross_profit);
              ?>
            </td>
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
            <td style="padding-left:30px;">Biaya</td>
            <td>{{number_format($totUtilities)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:30px;">Gaji</td>
            <td>{{number_format($totSalary)}}</td>
            <td></td>
          </tr>
          <tr>
            <td style="padding-left:30px;">Bensin</td>
            <td>{{number_format($totGasolines)}}</td>
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
            <td>( {{number_format($totExpenses)}} )</td>
          </tr>
          <tr>
            <th>Operating Income</th>
            <td></td>
            <td>
              <?php
                echo number_format($gross_profit - $totExpenses);
              ?>
            </td>
          </tr>
          <tr>
            <th>Income Before Tax</th>
            <td></td>
            <td>
              <?php
                $beforeTax = $gross_profit - $totExpenses;
                echo number_format($beforeTax);
              ?>
            </td>
          </tr>
          <tr>
            <td>Income Tax</td>
            <td></td>
            <td>
              <?php
                $incomeTax = 0.01 * $gross_profit;
                echo number_format($incomeTax);
              ?>
            </td>
          </tr>
          <tr>
            <th>Net Profit</th>
            <td></td>
            <td>
              <?php
                $net_profit = $beforeTax - $incomeTax;
                echo number_format($net_profit);
              ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
@endsection
