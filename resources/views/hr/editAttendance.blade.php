@extends('layouts.app')

@include('includes.navbar')

@section('content')
  {{$attendance->created_at}}
@endsection
