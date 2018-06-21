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
                <h3 class="panel-title">Pendapatan</h3>
              </div>
              <div class="panel-body">
                <p>Total Pendapatan Selain Penjualan</p>
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
                <table>
                  <tr>
                    <td><span class='glyphicon glyphicon-stop' style="color:#f4ce42;"></span></td>
                    <td>Kurang dari 7 hari menuju deadline</td>
                  </tr>
                  <tr>
                    <td><span class='glyphicon glyphicon-stop' style="color:#f44242;"></span></td>
                    <td>Lewat Deadline</td>
                  </tr>
                </table>
                <table class="table">
                  <tr>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Keterangan</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Detail</th>
                  </tr>

                    <?php
                      if($size == -1){
                        echo "<tr><td colspan='4' style='background-color:green;color:white;'>Tidak ada tanggal jatuh tempo dalam waktu dekat</td></tr>";
                      }
                      else{
                        $x = 0;
                        $date = date('Y-m-d');
                        $date1 = date_create($date);
                        foreach($piutangs as $piutang){
                          $date2 = date_create($piutang->piut_duedate);
                          $days_left = $date2->diff($date1);
                          $int = $days_left->days;
                          if($piutang->piut_duedate > $date && $int <= 7){
                            echo "<tr style='background-color:#f4ce42;color:white;'>";
                            echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$piutang->piut_duedate."</td>";
                            echo "<td>".$piutang->piut_desc."</td>";
                            echo "<td>".$piutang->piut_name."</td>";
                            echo "<td>".number_format($piutang->piut_amount)."</td>";
                            echo "<td><a class ='btn btn-primary'href='/piutangs/".$piutang->piut_id."'>Detail</a></td>";
                            echo "</tr>";
                          }
                          else if($piutang->piut_duedate < $date){
                            echo "<tr style='background-color:#f44242;color:white;'>";
                            echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$piutang->piut_duedate."</td>";
                            echo "<td>".$piutang->piut_desc."</td>";
                            echo "<td>".$piutang->piut_name."</td>";
                            echo "<td>".number_format($piutang->piut_amount)."</td>";
                            echo "<td><a class ='btn btn-primary'href='/piutangs/".$piutang->piut_id."'>Detail</a></td>";
                            echo "</tr>";
                          }
                          else if($piutang->piut_duedate > $date){
                            // echo "<tr>";
                            // echo "<td>".$piutang->piut_duedate."</td>";
                            // echo "<td>".$piutang->piut_desc."</td>";
                            // echo "<td>".$piutang->piut_name."</td>";
                            // echo "<td>".number_format($piutang->piut_amount)."</td>";
                            // echo "<td><a class ='btn btn-primary'href='/piutangs/".$piutang->piut_id."'>Detail</a></td>";
                            // echo "</tr>";
                          }
                        }
                        // foreach($piutangs as $piutang){
                        //   if($piutang->piut_id == $piut_duedates[$x]){
                        //     if($piut_days[$x] < 7){
                        //         echo "<tr style='background-color:#f4ce42;color:white;'>";
                        //     }
                        //     else{
                        //       echo "<tr>";
                        //     }
                        //     if($piut_days[$x] < 3){
                        //       echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$piutang->piut_duedate."</td>";
                        //     }
                        //     else{
                        //       echo "<td>".$piutang->piut_duedate."</td>";
                        //     }
                        //     echo "<td>".$piutang->piut_desc."</td>";
                        //     echo "<td>".$piutang->piut_name."</td>";
                        //     echo "<td>".number_format($piutang->piut_amount)."</td>";
                        //     echo "<td><a class ='btn btn-primary'href='/piutangs/".$piutang->piut_id."'>Detail</a></td>";
                        //     echo "</tr>";
                        //   }
                        //   $x++;
                        //   if($x == $size){
                        //     break;
                        //   }
                        // }

                      }

                     ?>

                </table>
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
                <table>
                  <tr>
                    <td><span class='glyphicon glyphicon-stop' style="color:#f4ce42;"></span></td>
                    <td>Kurang dari 7 hari menuju deadline</td>
                  </tr>
                  <tr>
                    <td><span class='glyphicon glyphicon-stop' style="color:#f44242;"></span></td>
                    <td>Lewat Deadline</td>
                  </tr>
                </table>
                <table class="table">
                  <tr>
                    <th>Tanggal Jatuh Tempo</th>
                    <th>Keterangan</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Detail</th>
                  </tr>

                    <?php
                      if($size_utg == -1){
                        echo "<tr><td colspan='5' style='background-color:green;color:white;'>Tidak ada tanggal jatuh tempo dalam waktu dekat</td></tr>";
                      }
                      else{
                        $x = 0;
                        $date = date('Y-m-d');
                        $date1 = date_create($date);
                        foreach($utangs as $utang){
                          $date2 = date_create($utang->utg_duedate);
                          $days_left = $date2->diff($date1);
                          $int = $days_left->days;
                          if($utang->utg_duedate > $date && $int <= 7){
                            echo "<tr style='background-color:#f4ce42;color:white;'>";
                            echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$utang->utg_duedate."</td>";
                            echo "<td>".$utang->utg_desc."</td>";
                            echo "<td>".$utang->utg_name."</td>";
                            echo "<td>".number_format($utang->utg_amount)."</td>";
                            echo "<td><a class ='btn btn-primary'href='/piutangs/".$utang->utg_id."'>Detail</a></td>";
                            echo "</tr>";
                          }
                          else if($utang->utg_duedate < $date){
                            echo "<tr style='background-color:#f44242;color:white;'>";
                            echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$utang->utg_duedate."</td>";
                            echo "<td>".$utang->utg_desc."</td>";
                            echo "<td>".$utang->utg_name."</td>";
                            echo "<td>".number_format($utang->utg_amount)."</td>";
                            echo "<td><a class ='btn btn-primary'href='/piutangs/".$utang->utg_id."'>Detail</a></td>";
                            echo "</tr>";
                          }
                          else if($utang->utg_duedate > $date){
                            // echo "<tr>";
                            // echo "<td>".$piutang->piut_duedate."</td>";
                            // echo "<td>".$piutang->piut_desc."</td>";
                            // echo "<td>".$piutang->piut_name."</td>";
                            // echo "<td>".number_format($piutang->piut_amount)."</td>";
                            // echo "<td><a class ='btn btn-primary'href='/piutangs/".$piutang->piut_id."'>Detail</a></td>";
                            // echo "</tr>";
                          }
                        }
                        // foreach($utangs as $utang){
                        //   if($utang->utg_id == $utg_duedates[$x]){
                        //
                        //     if($utg_days[$x] < 3){
                        //         echo "<tr style='background-color:#f4ce42;color:white;'>";
                        //     }
                        //     else{
                        //       echo "<tr>";
                        //     }
                        //     echo "<td><span class='glyphicon glyphicon-exclamation-sign'></span> ".$utang->utg_duedate."</td>";
                        //     echo "<td>".$utang->utg_desc."</td>";
                        //     echo "<td>".$utang->utg_name."</td>";
                        //     echo "<td>".number_format($utang->utg_amount)."</td>";
                        //     echo "<td><a class ='btn btn-primary'href='/utangs/".$utang->utg_id."'>Detail</a></td>";
                        //     echo "</tr>";
                        //   }
                        //   $x++;
                        //   if($x == $size_utg){
                        //     break;
                        //   }
                        // }
                      }

                     ?>
                  </tr>
                </table>
                <a href="utangs" class="btn btn-primary">Lihat List Utang</a>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection
