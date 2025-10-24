<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>@yield('title','Halcon Admin')</title>
  @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 text-gray-900">
  <div class="min-h-screen flex">

    {{-- Sidebar --}}
    <aside class="hidden md:flex md:w-64 flex-col border-r border-gray-200 bg-white">
      <div class="h-16 flex items-center px-6 border-b">
        <span class="font-semibold tracking-tight">🦅 Halcon</span>
      </div>
      <nav class="p-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium' : '' }}">
          <span>🏠</span><span>Dashboard</span>
        </a>
        <a href="{{ route('customers.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->is('admin/customers*') ? 'bg-gray-100 font-medium' : '' }}">
          <span>👤</span><span>Customers</span>
        </a>
        <a href="{{ route('orders.index') }}" class="flex items-center gap-3 px-3 py-2 rounded-lg hover:bg-gray-100 {{ request()->is('admin/orders*') ? 'bg-gray-100 font-medium' : '' }}">
          <span>📦</span><span>Orders</span>
        </a>
      </nav>
      <div class="mt-auto p-4 border-t">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn w-full">Log out</button>
        </form>
      </div>
    </aside>

    {{-- Main --}}
    <div class="flex-1 flex flex-col">
      <header class="h-16 flex items-center justify-between px-4 md:px-8 border-b bg-white">
        <div class="font-medium">@yield('page_title','Dashboard')</div>
        <div class="text-sm text-gray-600">
          {{ auth()->user()->name ?? 'Guest' }}
        </div>
      </header>

      <main class="p-4 md:p-8">
        @if(session('status'))
          <div class="mb-4 card">
            <div class="card-body text-sm text-green-700">{{ session('status') }}</div>
          </div>
        @endif
        @yield('content')
      </main>
    </div>
  </div>
</body>
</html>
