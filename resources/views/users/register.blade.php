@extends('layouts.master')
@section('title', 'Register page')
@section('content')

<h1>Create new user</h1>
@if(session()->has('error'))
 <p style="color: red">{{ session()->get('error') }}</p>
@endif
<form action="{{route('register')}}" method="POST">
	@csrf
	<div class="form-group">
		<div class="form-group">
		<label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email" autocomplete="off">
       
        @if($errors->has('email'))
            <p style="color: red;">{{ $errors->first('email') }}</p>
        @endif
    </div>
    <div class="form-group">
		<label for="name">{{ trans('message.users.create.username') }}</label>
        <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="name" autocomplete="off">
        @if($errors->has('username'))
            <p style="color: red;">{{ $errors->first('username') }}</p>
        @endif
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" value="{{ old('password') }}" class="form-control" id="password" autocomplete="off">
        @if($errors->has('password'))
            <p style="color: red;">{{ $errors->first('password') }}</p>
        @endif
    </div>
    <div class="form-group">
		<label for="password">Password Confirm</label>
		<input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control" id="password" autocomplete="off">
        @if($errors->has('password_confirmation'))
            <p style="color: red;">{{ $errors->first('password_confirmation') }}</p>
        @endif
	</div>
	<div class="form-group">
		<label for="gender">Gender</label>
		<input type="text" name="gender" value="{{ old('gender') }}" class="form-control" id="gender" autocomplete="off">
        @if($errors->has('gender'))
            <p style="color: red;">{{ $errors->first('gender') }}</p>
        @endif
    </div>
    <div class="form-group">
		<label for="gender">Country</label>
		<input type="text" name="country_id" value="{{ old('country_id') }}" class="form-control" id="country" autocomplete="off">
        @if($errors->has('country_id'))
            <p style="color: red;">{{ $errors->first('country_id') }}</p>
        @endif
    </div>
    
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="phone" autocomplete="off">
        @if($errors->has('phone'))
            <p style="color: red;">{{ $errors->first('phone') }}</p>
        @endif
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection