<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title', 'Halcon App')</title>
</head>
<body>
  <header>
    <a href="{{ route('public.home') }}">Home</a>
    @auth
      <a href="{{ route('admin.dashboard') }}">Admin</a>
      <form action="{{ route('logout') }}" method="POST" style="display:inline">@csrf<button type="submit">Logout</button></form>
    @else
      <a href="{{ route('login') }}">Login</a>
    @endauth
  </header>
  <hr>
  <main>
    @yield('content')
  </main>
</body>
</html>
