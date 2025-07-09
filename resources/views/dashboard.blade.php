<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Dashboard</h2>

    <p>Selamat datang, {{ auth()->user()->username }}!</p>

    @if(auth()->user()->role === 'admin')
        <ul>
            <li><a href="{{ route('warga.index') }}">Data Warga</a></li>
            <li><a href="{{ route('jimpitan.index') }}">Data Jimpitan</a></li>
        </ul>
    @else
        <ul>
            <li><a href="{{ route('jimpitan.user') }}">Lihat Jimpitan</a></li>
        </ul>
    @endif

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>
