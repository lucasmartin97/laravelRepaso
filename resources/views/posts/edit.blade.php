@extends('layouts.app')

@section('title', $post->title)

@section('content')
    <h1>Editar Post</h1>
    <form action="{{route('posts.update', $post)}}" method="POST">
        @csrf
        {{-- Los navegadores solo soportan los metodos GET/POST entonces el patch lo pasamos en blade. --}}
        @method('PATCH') 
        @include('posts.form-fields')
    </form>
    <a href="{{route('posts.index')}}">Regresar</a>
@endsection