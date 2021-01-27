@extends('layouts.master')
@section('title', 'Login page')
@section('content')

<h1>Login</h1>
@if(session()->has('error'))
 <p style="color: red">{{ session()->get('error') }}</p>
@endif
<form action="{{ route('login') }}" method="POST">
    @csrf
    <input name="email" type="text" value="{{ old('email') }}">
    <input name="password" type="password">
    <button type="submit">submit</button>
</form>
@endsection