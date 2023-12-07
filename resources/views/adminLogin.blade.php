@extends('layouts')
@section('title-block')
    Admin Login Page
@endsection
@section('content')
<div class="login_bg">
<div class="login-container">
    <h2>Login</h2>
    <form action="{{route("loginAdmin")}}" method="post">
        @csrf
        <label for="username">Username:</label>
        <input type="text" id="uname" name="login" required>
        <label for="password">Password:</label>
        <input type="password" id="pass" name="password" required>
        <input type="submit" value="Login">
    </form>
</div>
</div>
@endsection
