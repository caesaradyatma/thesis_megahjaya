@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>Hitung Gaji</h1>
  <hr>
  {{-- <form action ="PayrollController@setPayroll" method="POST"> --}}
  {!! Form::open(['action' => 'PayrollController@setPayroll', 'method' => 'POST']) !!}
    <div class="form-group">
      <label for="amount">Jumlah Gaji Pokok (Per Hari)</label>
      <input name= "salary_base" type="number" class="form-control" value={{$basePayroll->payroll_amount}}>
      <p class="help-block">Gaji Pokok</p>
    </div>
    <div class="form-group">
      <label for="amount">Bonus Pegawai Wanita</label>
      <input name= "salary_women" type="number" class="form-control" value={{$womenPayroll->payroll_amount}}>
      <p class="help-block">Gaji Pokok</p>
    </div>
    <div class="form-group">
      <h2>Gaji Bonus</h2>
      <small>Bonus Saat Ini</small>
      <table class="table">
        <tr>
          <th>Nama Bonus</th>
          <th>Kondisi</th>
          <th>Jumlah Bonus</th>
        </tr>
        <tr>
          <td>{{$jabatanPayroll->payroll_name}}</td>
          <td>{{$jabatanPayroll->payroll_condition}}</td>
          <td>{{$jabatanPayroll->payroll_amount}}</td>
        </tr>
        <tr>
          <td>{{$eduPayroll->payroll_name}}</td>
          <td>{{$eduPayroll->payroll_condition}}</td>
          <td>{{$eduPayroll->payroll_amount}}</td>
        </tr>
      </table>
      <hr>
      <button class="add_form_field btn btn-primary">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button>
      <table id="prod">
        <tr>
          <td>
            {{-- <input type="text" name="bonus_name[]" class="form-control" id="wek" placeholder="Nama Bonus"> --}}
            <select class="form-control" name="bonus_name[]">
              <option  value="emp_type">Jabatan</option>
              <option  value="emp_education">Pendidikan Terakhir</option>
            </select>
          </td>
          <td>
            <input type="text" name="bonus_condition[]" class="form-control" placeholder="kondisi">
          </td>
          <td>
            <input type="number" name="bonus_amount[]" class="form-control"placeholder="Jumlah Bonus">
          </td>
        </tr>
      </table>
    </div>

    <input type="submit" name="submit" value="Submit" class="btn btn-primary form-control">
  {{-- </form> --}}
  {!! Form::close() !!}
@endsection

@section('scripts')
  <script>
    // $(document).ready(function(){
    //   $("#btn1").click(function(){
    //       $("#wek").append("<input type='text' class='form-control' id='wex' placeholder='Products'>");
    //   });
    // });
    $(document).ready(function() {
        var max_fields      = 10;
        var wrapper         = $("#prod");
        var add_button      = $(".add_form_field");

        var x = 1;
        $(add_button).click(function(e){
            e.preventDefault();
            if(x < max_fields){
                x++;
                // $(wrapper).append('<div><input type="text" class="form-control" placeholder="Products" name="products[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
                $(wrapper).append('<tr><td><select class="form-control" name="bonus_name[]"><option name="bonus_name[]" value="emp_type">Jabatan</option><option name="bonus_name[]" value="emp_education">Pendidikan Terakhir</option></select></td><td><input type="text" name="bonus_condition[]" class="form-control"></td><td><input type="number" name="bonus_amount[]" class="form-control"></td><td><a href="#" class="delete">Delete</a></td><tr>'); //add input box
            }
            else
            {
                alert('You Reached the limits')
            }
        });

        $(wrapper).on("click",".delete", function(e){
            e.preventDefault(); $(this).parents('tr').remove(); x--;
        })
    });
  </script>

@endsection
