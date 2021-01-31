@extends('layouts.master')
@section('content')
<h1>Create User:</h1>
<form action="{{route('users.store')}}" method="POST" id="create-user">
	@csrf
	<div class="form-group">
		<div class="form-group">
		<label for="email">Email</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control"  autocomplete="off">
        <p style="color: red;" id="email"></p>
        @if($errors->has('email'))
            <p style="color: red;">{{ $errors->first('email') }}</p>
        @endif
    </div>
    <div class="form-group">
		<label for="name">{{ trans('message.users.create.username') }}</label>
        <input type="text" name="username" value="{{ old('username') }}" class="form-control"  autocomplete="off">
        <p style="color: red;" id="username"></p>
        @if($errors->has('username'))
            <p style="color: red;">{{ $errors->first('username') }}</p>
        @endif
	</div>
	<div class="form-group">
		<label for="password">Password</label>
		<input type="password" name="password" value="{{ old('password') }}" class="form-control"  autocomplete="off">
        <p style="color: red;" id="password"></p>
        @if($errors->has('password'))
            <p style="color: red;">{{ $errors->first('password') }}</p>
        @endif
	</div>
	<div class="form-group">
		<label for="gender">Gender</label>
		<input type="text" name="gender" value="{{ old('gender') }}" class="form-control"  autocomplete="off">
        <p style="color: red;" id="gender"></p>
        @if($errors->has('gender'))
            <p style="color: red;">{{ $errors->first('gender') }}</p>
        @endif
    </div>
    <div class="form-group">
		<label for="gender">Country</label>
		<input type="text" name="country_id" value="{{ old('country_id') }}" class="form-control"  autocomplete="off">
        <p style="color: red;" id="country_id"></p>
        @if($errors->has('country_id'))
            <p style="color: red;">{{ $errors->first('country_id') }}</p>
        @endif
    </div>
    
	<div class="form-group">
		<label for="phone">Phone</label>
		<input type="text" name="phone" value="{{ old('phone') }}" class="form-control"  autocomplete="off">
        @if($errors->has('phone'))
            <p style="color: red;">{{ $errors->first('phone') }}</p>
        @endif
	</div>
	<button type="submit" class="btn btn-primary">Submit</button>
</form>
<div id="created"></div>
<script>
 $(document).ready(function(){

    $('#create-user').submit(function(e){
        e.preventDefault();
        $.ajax({
            url: '/api/users',
            type: 'POST',
            data: {
                'username' : $('input[name="username"]').val(),
                'email' : $('input[name="email"]').val(),
                'password' : $('input[name="password"]').val(),
                'gender' : $('input[name="gender"]').val(),
                'country_id' : $('input[name="country_id"]').val(),
                'phone' : $('input[name="phone"]').val()
            },
            success: function(respone){
                var content = '<table>'+
                    '<thead>'+
                        '<td>UserName</td>'+
                        '<td>Email</td>'+
                        '<td>Gender</td>'+
                        '<td>Phone</td>'+
                    '</thead>'+
                    '<tbody>'+
                        '<tr>'+
                            '<td>'+respone.username+'</td>'+
                            '<td>'+respone.email+'</td>'+
                            '<td>'+respone.gender+'</td>'+
                            '<td>'+respone.phone+'</td>'+
                        '</tr>'+
                    '</tbody>'+
                    '</table>';
                $('#created').html(content);
            },
            error: function(respone){
                $('p').text('');
                $.each(respone.responseJSON.error, function(key,item){
                    console.log(key, item);
        
                    $('#'+key).html(item[0]);
                })
            }
        });
    });
 });
</script>
@endsection