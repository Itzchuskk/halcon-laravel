@extends('layouts.admin')
@section('title','New Customer')
@section('page_title','New Customer')
@section('content')
  <div class="card max-w-2xl">
    <div class="card-body">
      <form method="POST" action="{{ route('customers.store') }}" class="space-y-4">
        @csrf
        <div>
          <label class="block text-sm mb-1">Name</label>
          <input class="input" name="name" required>
        </div>
        <div class="grid md:grid-cols-2 gap-4">
          <div>
            <label class="block text-sm mb-1">Email</label>
            <input class="input" type="email" name="email">
          </div>
          <div>
            <label class="block text-sm mb-1">Phone</label>
            <input class="input" name="phone">
          </div>
        </div>
        <div>
          <label class="block text-sm mb-1">Address</label>
          <input class="input" name="address">
        </div>
        <div class="flex gap-2">
          <button class="btn-primary" type="submit">Save</button>
          <a class="btn" href="{{ route('customers.index') }}">Cancel</a>
        </div>
      </form>
    </div>
  </div>
@endsection
