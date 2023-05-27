@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <h1>Ingresar</h1>

    {{-- La var $errors->all() tiene todos los errores de validacion --}}

    <form method="POST">
        @csrf
        <label for="email">
            <input type="email" name="email" id="email">
        </label> <br>
        <label for="pw">
            <input type="password" name="password" id="pw">
        </label> <br>
        <button type="submit">Login</button>
    </form>
@endsection