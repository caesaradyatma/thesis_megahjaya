@extends('layouts.app')

@include('includes.navbar')

@section('content')
  <h1>POSTS</h1>
  @if (count($posts)>0)
    @foreach ($posts as $post)
      <div class="well">
        <a href='/posts/{{$post->id}}'>
          <h3>{{$post->title}}</h3>
        </a>
        <small>{{$post->created_at}}</small>
      </div>
    @endforeach
    {{$posts->links()}};
  @else
    <div class="btn-danger">
      <p>There are no posts</p>
    </div>
  @endif
@endsection
