@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container">
    <h1>Cash Flow Statement of TB. Megah Jaya</h1>
    <h3>For the Year Ended {{$period2}}</h3>
    <table border="1">
      <tr>
        <th>Cash Flows From Operating Activities</th>
        <th></th>
      </tr>
      <tr>
        <td style="padding-left:50px;">Sales</td>
        <td style="padding-left:50px;">{{$totSales}}</td>
      </tr>
      <tr>
        <th>Cash Flows From Investing Activities</th>
        <td></td>
      </tr>
      <tr>
        <th>Cash Flows From Financing Activities</th>
        <td></td>
      </tr>
      <tr>
        <td style="padding-left:50px;">Piutang</td>
        <td style="padding-left:50px;">{{$totPiutangs}}</td>
      </tr>

      @foreach($incomes as $income)


      @endforeach
    </table>

  </div>
@endsection
