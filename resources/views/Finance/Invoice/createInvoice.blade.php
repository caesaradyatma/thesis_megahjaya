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
        <th>Dikali</th>
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
        <a href="getCart/deleteCart" class="btn btn-danger">Hapus Pesanan</a>
      </div>
      <div class='col-sm-6'>
        <a href="create" class="btn btn-primary">Tambah Pesanan</a>
      </div>
    </div>
    <hr>
    <small>Data Pelanggan</small>
    {!! Form::open(['action' => 'InvoicesController@store','method' => 'POST']) !!}
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
        {{Form::label('inv_type', 'Jenis Transaksi')}}
        {{Form::select('inv_type',[1=>'Lunas',2=>'Diantar',3=>'Utang'],'',['class'=>'form-control'])}}
      </div>
      <div class="form-group">
        <label for="Products"></label>
        <input type="text" class="form-control" id="wek" placeholder="Products">

      </div>
      <button id="btn1">Append form</button>
      {{Form::hidden('_method','POST')}}
      {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
    {!! Form::close() !!}
  </div>
@endsection
@section('scripts')
  <script>
    $(document).ready(function(){
      $("#btn1").click(function(){
          $("#wek").append("<input type='text' class='form-control' id='wex' placeholder='Products'>");
      });
    });
  </script>

@endsection
