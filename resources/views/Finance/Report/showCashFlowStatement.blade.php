@extends('layouts.app')

@include('includes.navbar')

@section('content')
  @foreach($incomes as $income)
    {{$income->in_id}}
  @endforeach
@endsection
