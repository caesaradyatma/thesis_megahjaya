@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <a href="/posts" class="btn btn-default">Back to Posts</a>
  <h1>{{$post->title}}</h1>
  <small>{{$post->created_at}}</small>
  <hr>
  <div class="panel">
    <p>{{$post->body}}</p>
  </div>
@endsection
