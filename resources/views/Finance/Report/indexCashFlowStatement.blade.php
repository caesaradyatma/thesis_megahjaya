@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
      </div>
      <div class="col-sm-6">
        <h2>Cash Flow Statement</h2>
        <small>Pilih periode yang akan dicakup oleh laporan</small>
        {!! Form::open(['action' => 'CashFlowStatementController@show', 'method' => 'GET']) !!}
          {{-- <div class="form-group">
            {{Form::label('period1',"Mulai Periode")}}
            {{Form::date('period1','',['class'=>'form-control'])}}
          </div>
          <div class="form-group">
            {{Form::label('period2',"Akhir Periode")}}
            {{Form::date('period2','',['class'=>'form-control'])}}
          </div> --}}
          <div class="form-group">
            {{Form::label('year',"Tahun/Periode")}}
            {{Form::number('year','',['class'=>'form-control','min'=>2017])}}
          </div>
          {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
        {!! Form::close() !!}
      </div>
      <div class="col-sm-3">
      </div>
    </div>
  </div>
@endsection
