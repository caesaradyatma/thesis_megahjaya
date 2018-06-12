@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class='col-sm-12'>
    <h1>General Ledger</h1>
  </div>
  <div class="col-sm-12">
    <table class="table">
      <tr>
        <th>Tanggal</th>
        <th>Nama Transaksi</th>
        <th>Debit</th>
        <th>Kredit</th>
      </tr>
      @foreach($incomes as $income)
        <tr>
          @if($flow[$income->in_type - 1] == 'incomes')
            <td>{{$income->in_date}}</td>
            <td>Cash</td>
            <td>{{$income->in_amount}}</td>
            <td></td>
            </tr>
            <tr>
              <td>{{$income->in_date}}</td>
              <td>{{$income->in_name}}</td>
              <td></td>
              <td>{{$income->in_amount}}</td>
            </tr>
          @endif
      @endforeach
      @foreach($outcomes as $outcome)
        <tr>
          @if($flow[$outcome->out_type - 1] == 'outcomes')
            <td>{{$outcome->out_date}}</td>
            <td>{{$outcome->out_name}}</td>
            <td>{{$outcome->out_amount}}</td>
            <td></td>
            </tr>
            <tr>
              <td>{{$outcome->out_date}}</td>
              <td>Cash</td>
              <td></td>
              <td>{{$outcome->out_amount}}</td>
            </tr>
          @endif
      @endforeach
    </table>
  </div>
@endsection
