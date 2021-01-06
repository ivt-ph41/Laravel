<h1>Input your email</h1>
<form action="{{ route('users.send-mail', 1) }}" method="POST">
    @csrf
    <input name="email" type="text">
    <button type="submit">submit</button>
</form>