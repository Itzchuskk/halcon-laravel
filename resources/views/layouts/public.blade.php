<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Halcon')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
  <header class="bg-white border-b">
    <div class="max-w-6xl mx-auto h-16 px-4 flex items-center justify-between">
      <a href="{{ route('public.home') }}" class="font-semibold">🦅 Halcon</a>
      <nav class="text-sm">
        <a class="btn" href="{{ route('public.track') }}">Track Order</a>
        @auth <a class="btn" href="{{ route('admin.dashboard') }}">Admin Panel</a> @endauth
      </nav>
    </div>
  </header>
  <main class="max-w-6xl mx-auto p-4 md:p-8">@yield('content')</main>
</body>
</html>
