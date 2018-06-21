@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Utang</h1>
  <hr>
  <div class="col-sm-4">
      <a href="utangs/create" class="btn btn-primary">Input data Utang</a>
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

  @if (count($utangs)>0)
    <table class="table table-striped">
      <tr>
        <th>Utang ID</th>
        <th>Status</th>
        <th>Nama Kreditur</th>
        <th>Keterangan</th>
        <th>Jumlah Utang</th>
        <th>Tanggal Jatuh Tempo</th>
        <th>Details</th>
      </tr>
      @foreach ($utangs as $utang)
        <tr>
          <td>
            <p>{{$utang->utg_id}}</p>
          </td>
          <td>
            @if ($utang->utg_status == 1)
              <p style="background-color:green;color:white;">Lunas</p>
            @elseif ($utang->utg_status == 0)
              <?php
                $date = date('Y-m-d');
                $date1 = date_create($date);
                $date2 = date_create($utang->utg_duedate);
                $days_left = $date2->diff($date1);
                $int = $days_left->days;
              ?>
              @if($utang->utg_duedate > $date && $int <= 7)
                <p><span class='glyphicon glyphicon-exclamation-sign'style="color:#f4ce42;"></span>Belum Lunas</p>
              @elseif($utang->utg_duedate < $date)
                <p><span class='glyphicon glyphicon-exclamation-sign'style="color:#f44242;"></span>Belum Lunas</p>
              @else
                <p>Belum Lunas</p>
              @endif
            @endif
          </td>
          <td>
            <p>{{$utang->utg_name}}</p>
          </td>
          <td>
            <p>{{$utang->utg_desc}}</p>
          </td>
          <td>
            <p>{{number_format($utang->utg_amount)}}</p>
          </td>
          <td>
            <p>{{$utang->utg_duedate}}</p>
          </td>
          <td>
            <a href='/utangs/{{$utang->utg_id}}'class="btn btn-default">
              Details
            </a>
          </td>
        </tr>
      @endforeach
    </table>
    <center>
      {{ $utangs->links() }}
    </center>
    {{-- {{$utangs->links()}}; --}}
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
