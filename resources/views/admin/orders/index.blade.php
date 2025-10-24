@extends('layouts.admin')
@section('title','Orders')
@section('page_title','Orders')
@section('content')
  <div class="flex items-center justify-between mb-4">
    {{-- Filters --}}
    <form method="GET" class="flex flex-wrap gap-2">
      <input class="input" name="q" value="{{ request('q') }}" placeholder="Search invoice or customer...">
      <select class="select" name="status">
        <option value="">All Statuses</option>
        @foreach(['ordered','processed','routed','delivered','cancelled'] as $st)
          <option value="{{ $st }}" @selected(request('status')===$st)>{{ ucfirst($st) }}</option>
        @endforeach
      </select>
      <button class="btn">Filter</button>
    </form>

    {{-- Create Order --}}
    <a href="{{ route('orders.create') }}" class="btn-primary">New Order</a>
  </div>

  {{-- Table --}}
  <div class="card">
    <div class="card-body overflow-x-auto">
      <table class="table">
        <thead>
          <tr>
            <th class="th">ID</th>
            <th class="th">Invoice</th>
            <th class="th">Customer</th>
            <th class="th">Status</th>
            <th class="th">Actions</th>
          </tr>
        </thead>
        <tbody>
        @forelse($orders as $o)
          <tr class="hover:bg-gray-50">
            <td class="td">{{ $o->id }}</td>
            <td class="td">
              <a class="text-indigo-600 hover:underline" href="{{ route('orders.show',$o) }}">
                {{ $o->invoice_number }}
              </a>
            </td>
            <td class="td">{{ $o->customer?->name ?? '—' }}</td>
            <td class="td">
              <span class="px-2 py-1 rounded-full text-xs bg-gray-100 border capitalize">
                {{ $o->status }}
              </span>
            </td>
            <td class="td">
              <div class="flex gap-2">
                <a class="btn" href="{{ route('orders.edit',$o) }}">Edit</a>
                <form action="{{ route('orders.destroy',$o) }}" method="POST" class="inline">
                  @csrf @method('DELETE')
                  <button class="btn-danger" onclick="return confirm('Delete this order?')">Delete</button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="td text-center text-gray-500 text-sm">No orders found.</td>
          </tr>
        @endforelse
        </tbody>
      </table>

      {{-- Pagination --}}
      <div class="mt-4">
        {{ $orders->links() }}
      </div>
    </div>
  </div>
@endsection
