@extends('layouts.app')

@section('title', 'Crear post')

@section('content')
    <h1>Crear post</h1>

    {{-- La var $errors->all() tiene todos los errores de validacion --}}

    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        @include('posts.form-fields')
    </form>
@endsection