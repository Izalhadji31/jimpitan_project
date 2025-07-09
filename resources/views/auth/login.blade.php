<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    @if(session('error'))
        <p style="color:red">{{ session('error') }}</p>
    @endif
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <label>Username:</label>
        <input type="text" name="username"><br><br>
        <label>Password:</label>
        <input type="password" name="password"><br><br>
        <button type="submit">Login</button>
    </form>
    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a></p>
</body>
</html>
