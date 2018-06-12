@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Pendapatan</h1>
  <div class="col-sm-4">
      <small>List Pendapatan</small>
  </div>
  <div class="col-sm-4">
  </div>
  <div class="col-sm-4">
    <center>
      <form>
        <div class="form-group">
          <input type="text" name="searchValue" style="form-control" placeholder="search">
          <input type="submit" name="submit" value="submit" class="btn btn-primary">
        </div>
      </form>
    </center>
  </div>
  @if (count($incomes)>0)
    <table class="table table-striped">
      <tr>
        <th>ID</th>
        <th>Tipe</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Tanggal Transaksi</th>
        <th>Keterangan</th>
        <th>Details</th>
      </tr>
      @foreach ($incomes as $income)
        <tr>
          <td>
            <p>{{$income->in_id}}</p>
          </td>
          <td>
            @if ($income->in_type == 1)
              <p>Penjualan</p>
            @elseif ($income->in_type == 2)
              <p>Penambahan Modal</p>
            @endif
          </td>
          <td>
            <p>{{$income->in_name}}</p>
          </td>
          <td>
            <p>{{number_format($income->in_amount)}}</p>
          </td>
          <td>
            <p>{{$income->in_date}}</p>
          </td>
          <td>
            <p>{{$income->in_desc}}</p>
          </td>
          <td>
            <a href='/incomes/{{$income->in_id}}'class="btn btn-default">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </table>
    {{$incomes->links()}};
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
