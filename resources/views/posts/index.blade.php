@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<br>
<hr>
<br>
<a href="{{route('posts.create')}}">Crear nuevo post</a>
<br>
<hr>
<br>
<h1>Posts</h1>
<p>
    {{-- Enviamos por post el id del post a la ruta posts.show --}}
    @foreach ($posts as $post)
        <a href="{{route('posts.show', $post)}}">{{$post->title}}</a> | <a href="{{route('posts.edit', $post)}}">edit</a>
        <form action="{{route('posts.destroy', $post)}}" method="post">
            {{-- Creamos form y seteamos method delete para que la peticion delete funcione --}}
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
        <br>
    @endforeach
</p>
@endsection