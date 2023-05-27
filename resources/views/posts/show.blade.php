@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <a href="{{route('posts.index')}}">Regresar</a>
@endsection