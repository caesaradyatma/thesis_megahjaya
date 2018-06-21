@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container-fluid">
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Ubah Jumlah Pesanan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            {!! Form::open(['action' => 'InvoicesController@editCart','method' => 'POST']) !!}
              <div class="form-group">
                {{Form::label('item_name', 'Nama Barang')}}
                <select name="item_name" class="form-control">
                  @foreach ($products as $product)
                    <option value="{{$product['item']['item_name']}}">
                      {{$product['item']['item_name']}}
                    </option>
                  @endforeach
                </select>
              </div>
              <div class="form-group">
                {{Form::label('order_quantity', 'Jumlah Pesanan yang Baru')}}
                {{Form::number('order_quantity','',['class'=>'form-control','placeholder'=>'Jumlah Pesanan'])}}
              </div>
              {{Form::hidden('_method','POST')}}
              {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
            {!! Form::close() !!}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
    <h1>Bon Pembelian</h1>
    <hr>
    <small>List barang yang dipesan</small>
    <table class="table table-striped">
      <tr>
        <th>Nama Barang</th>
        <th>Jumlah Pesanan</th>
        <th>Harga Satuan</th>
        <th>Jumlah X Harga</th>
        <th>Edit</th>
      </tr>
      @if(Session::has('cart'))
        @foreach($products as $product)
          <tr>
            <td>{{$product['item']['item_name']}}</td>
            <td>{{$product['order_quantity']}}</td>
            <td>{{number_format($product['item']['item_price'])}}</td>
            <td>{{number_format($product['order_quantity']*$product['item']['item_price'])}}</td>
            {{-- <td><a href="{{url('invoices/editCart/'.$product['item']['id'])}}">Ubah Jumlah Pesanan</td> --}}
            <td>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Edit Jumlah Pesanan
              </button>
            </td>
          </tr>
        @endforeach
      @else
      @endif
      <tr>
        <th colspan="3">Total Price</th>
        <td>{{number_format($totPrice)}}</td>
        <td></td>
      </tr>
    </table>
    <div class="row">
      <div class='col-sm-6'>
        <a href="getCart/deleteCart" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin ingin Menghapus Pesanan?')">Hapus Pesanan</a>
      </div>
      <div class='col-sm-6'>
        <a href="create" class="btn btn-primary">Tambah Pesanan</a>
      </div>
    </div>
    <hr>
    <small>Data Pelanggan</small>
    {!! Form::open(['action' => 'InvoicesController@store','method' => 'POST','id'=>'test','onsubmit'=>"return confirm('Apakah anda yakin akan memasukan data ini? Data invoice tidak dapat diubah setelah disubmit');"]) !!}
      <div class="form-group">
        {{Form::label('cst_name', 'Nama Pelanggan')}}
        {{Form::text('cst_name','',['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('cst_company', 'Nama Perusahaan')}}
        {{Form::text('cst_company','',['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_date', 'Tanggal Transaksi')}}
        {{Form::date('inv_date','',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_totPrice', 'Total Harga')}}
        {{Form::number('inv_totPrice',$totPrice,['class'=>'form-control','placeholder'=>'Nama Pelanggan'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_phone', 'Nomor Telepon')}}
        {{Form::text('inv_phone','',['class'=>'form-control','placeholder'=>'Nomor Pelanggan','required'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_address', 'Alamat')}}
        {{Form::textArea('inv_address','',['class'=>'form-control','placeholder'=>'Alamat','required'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_type', 'Jenis Transaksi')}}
        {{Form::select('inv_type',[1=>'Bon 1',2=>'Bon 2 Tunai',3=>'Bon 3',4=>'Bon 2 Utang'],'',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        {{Form::label('inv_tax', 'PPN 10%')}}
        {{Form::select('inv_tax',[0=>'Tidak',1=>'Ya'],'',['class'=>'form-control'])}}
      </div>
      {{-- <div class="form-group1">
        <label for="Products">Barang yang Dipesan</label>
        <table id="prod">
          <tr>
            <td><input type="text" name="products[]" class="form-control" id="wek" placeholder="Products"></td>
            <td><input type="number" name="quantity[]" class="form-control"></td>
          </tr>
        </table>
        <input type="text" name="products[]" class="form-control" id="wek" placeholder="Products">
      </div> --}}
      {{Form::hidden('_method','POST')}}
      {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
    {!! Form::close() !!}
  </div>
  {{-- <button class="add_form_field">Add New Field &nbsp; <span style="font-size:16px; font-weight:bold;">+ </span></button> --}}

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
                $(wrapper).append('<tr><td><input type="text" class="form-control" placeholder="Products" name="products[]"/></td><td><input type="number" name="quantity[]" class="form-control"></td><td><a href="#" class="delete">Delete</a></td><tr>'); //add input box
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
