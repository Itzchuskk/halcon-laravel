@extends('layouts.admin')
@section('title','Dashboard')
@section('page_title','Dashboard')
@section('content')
  <div class="grid md:grid-cols-3 gap-6">
    <div class="card"><div class="card-body">
      <div class="text-xs text-gray-500">Customers</div>
      <div class="text-2xl font-semibold">{{ \App\Models\Customer::count() }}</div>
      <a class="btn mt-3" href="{{ route('customers.index') }}">View customers</a>
    </div></div>

    <div class="card"><div class="card-body">
      <div class="text-xs text-gray-500">Orders</div>
      <div class="text-2xl font-semibold">{{ \App\Models\Order::count() }}</div>
      <a class="btn mt-3" href="{{ route('orders.index') }}">View orders</a>
    </div></div>

    <div class="card"><div class="card-body">
      <div class="text-xs text-gray-500">Evidence Photos</div>
      <div class="text-2xl font-semibold">{{ \App\Models\EvidencePhoto::count() }}</div>
      <a class="btn mt-3" href="{{ route('orders.index') }}">Upload photo</a>
    </div></div>
  </div>
@endsection
