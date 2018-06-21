@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class='col-sm-12'>
    <h1>Pembukuan</h1>
    <a href="/ledger" class="btn btn-default">Kembali ke Menu Sebelum</a>
    @if($month == 1)
      <h3>Januari {{$year}}</h3>
    @elseif($month == 2)
      <h3>Februari {{$year}}</h3>
    @elseif($month == 3)
      <h3>Maret {{$year}}</h3>
    @elseif($month == 4)
      <h3>April {{$year}}</h3>
    @elseif($month == 5)
      <h3>Mei {{$year}}</h3>
    @elseif($month == 6)
      <h3>Juni {{$year}}</h3>
    @elseif($month == 7)
      <h3>Juli {{$year}}</h3>
    @elseif($month == 8)
      <h3>Agustus {{$year}}</h3>
    @elseif($month == 9)
      <h3>September {{$year}}</h3>
    @elseif($month == 10)
      <h3>Oktober {{$year}}</h3>
    @elseif($month == 11)
      <h3>November {{$year}}</h3>
    @elseif($month == 12)
      <h3>Desember {{$year}}</h3>
    @endif
  </div>
  <div class="col-sm-12">
    <table class="table table-striped">
      <tr>
        <th>Tanggal</th>
        <th>Nama Transaksi</th>
        <th>Debit</th>
        <th>Kredit</th>
      </tr>
      <?php
        foreach($ledgers as $ledger){
          if($ledger->actCode->flow == 'incomes'){
            echo "<tr>";
              echo "<td rowspan='3'>".$ledger->date."</td>";
              echo "<td>Cash</td>";
              echo "<td>".number_format($ledger->amount)."</td>";
              echo "<td></td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td style='padding-left:100px;'>".$ledger->desc."</td>";
              echo "<td></td>";
              echo "<td>".number_format($ledger->amount)."</td>";
            echo "</tr>";
            echo "<tr>";
              echo"<td colspan='3'>(Pendapatan)</td>";
            echo "</tr>";
          }
          else if($ledger->actCode->flow == 'outcomes'){
            echo "<tr>";
              echo "<td rowspan='3'>".$ledger->date."</td>";
              echo "<td>".$ledger->desc."</td>";
              echo "<td>".number_format($ledger->amount)."</td>";
              echo "<td></td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td style='padding-left:100px;'>Cash</td>";
              echo "<td></td>";
              echo "<td>".number_format($ledger->amount)."</td>";
            echo "</tr>";
            echo "<tr>";
              echo"<td colspan='3'>(Pengeluaran)</td>";
            echo "</tr>";
          }
          else if($ledger->actCode->flow == 'utangs'){
            echo "<tr>";
              echo "<td rowspan='3'>".$ledger->date."</td>";
              echo "<td>Cash</td>";
              echo "<td>".number_format($ledger->amount)."</td>";
              echo "<td></td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td style='padding-left:100px;'>".$ledger->desc."</td>";
              echo "<td></td>";
              echo "<td>".number_format($ledger->amount)."</td>";
            echo "</tr>";
            echo "<tr>";
              echo"<td colspan='3'>(Utang)</td>";
            echo "</tr>";
          }
          else if($ledger->actCode->flow == 'piutangs'){
            echo "<tr>";
              echo "<td rowspan='3'>".$ledger->date."</td>";
              echo "<td>".$ledger->desc."</td>";
              echo "<td>".number_format($ledger->amount)."</td>";
              echo "<td></td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td style='padding-left:100px;'>Cash</td>";
              echo "<td></td>";
              echo "<td>".number_format($ledger->amount)."</td>";
            echo "</tr>";
            echo "<tr>";
              echo"<td colspan='3'>(Piutang)</td>";
            echo "</tr>";
          }
          else if($ledger->actCode->flow == 'invoices'){
            echo "<tr>";
              echo "<td rowspan='3'>".$ledger->date."</td>";
              echo "<td>Cash</td>";
              echo "<td>".number_format($ledger->amount)."</td>";
              echo "<td></td>";
            echo "</tr>";
            echo "</tr>";
              echo "<td style='padding-left:100px;'>".$ledger->desc."</td>";
              echo "<td></td>";
              echo "<td>".number_format($ledger->amount)."</td>";
            echo "</tr>";
            echo "<tr>";
              echo"<td colspan='3'>(Penjualan)</td>";
            echo "</tr>";
          }

        }
       ?>
      {{-- @foreach($incomes as $income)
        <tr>
          @if($flow[$income->in_type - 1] == 'incomes')
            <td rowspan="2">{{$income->in_date}}</td>
            <td>Cash</td>
            <td>{{number_format($income->in_amount)}}</td>
            <td></td>
            </tr>
            <tr>
              <td style="padding-left:100px;">{{$income->in_name}}</td>
              <td></td>
              <td>{{number_format($income->in_amount)}}</td>
            </tr>
          @endif
      @endforeach
      @foreach($outcomes as $outcome)
        <tr>
          @if($flow[$outcome->out_type - 1] == 'outcomes')
            <td rowspan="2">{{$outcome->out_date}}</td>
            <td>{{$outcome->out_name}}</td>
            <td>{{number_format($outcome->out_amount)}}</td>
            <td></td>
            </tr>
            <tr>
              <td style="padding-left:100px;">Cash</td>
              <td></td>
              <td>{{number_format($outcome->out_amount)}}</td>
            </tr>
          @endif
      @endforeach
      @foreach($utangs as $utang)
        <tr>
          @if($flow[$utang->utg_type - 1] == 'utangs')
            <td rowspan="2">{{$utang->created_at}}</td>
            <td>Cash</td>
            <td>{{number_format($utang->utg_amount)}}</td>
            <td></td>
            </tr>
            <tr>
              <td style="padding-left:100px;">{{$utang->utg_desc}}</td>
              <td></td>
              <td>{{number_format($utang->utg_amount)}}</td>
            </tr>
          @endif
      @endforeach --}}
      <tr>
        <th colspan="2" style="text-align:center;">Total</th>
        <th>{{number_format($total)}}</th>
        <th>{{number_format($total)}}</th>
      </tr>
    </table>

  </div>
@endsection
