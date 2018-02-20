@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '',['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', '',['class' => 'form-control', 'placeholder' => 'Body' ])}}
    </div>
    {{Form::submit('Submit',['class'=>'btn btn-primary form-control'])}}
  {!! Form::close() !!}
@endsection
