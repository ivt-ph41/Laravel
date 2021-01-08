@extends('layouts.master')
@section('title', 'Forgot pass page')
@section('content')
<h1>Input your email</h1>
@if(session()->has('error'))
 <p style="color: red">{{ session()->get('error') }}</p>
@endif
<form action="{{ route('users.send-mail', 1) }}" method="POST">
    @csrf
    <input name="email" type="text">
    <button type="submit">submit</button>
</form>
@endsection