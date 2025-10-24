@extends('layouts.admin')
@section('title','Customers')
@section('page_title','Customers')
@section('content')
  <div class="flex items-center justify-between mb-4">
    <form method="GET" class="flex gap-2">
      <input class="input" name="q" value="{{ request('q') }}" placeholder="Search customer...">
      <button class="btn">Search</button>
    </form>
    <a href="{{ route('customers.create') }}" class="btn-primary">New Customer</a>
  </div>

  <div class="card">
    <div class="card-body overflow-x-auto">
      <table class="table">
        <thead>
          <tr>
            <th class="th">ID</th>
            <th class="th">Name</th>
            <th class="th">Email</th>
            <th class="th">Phone</th>
            <th class="th">Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($customers as $c)
          <tr class="hover:bg-gray-50">
            <td class="td">{{ $c->id }}</td>
            <td class="td"><a class="text-indigo-600 hover:underline" href="{{ route('customers.show',$c) }}">{{ $c->name }}</a></td>
            <td class="td">{{ $c->email }}</td>
            <td class="td">{{ $c->phone }}</td>
            <td class="td">
              <a class="btn" href="{{ route('customers.edit',$c) }}">Edit</a>
              <form action="{{ route('customers.destroy',$c) }}" method="POST" class="inline">
                @csrf @method('DELETE')
                <button class="btn-danger" onclick="return confirm('Delete customer?')">Delete</button>
              </form>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
      <div class="mt-4">{{ $customers->links() }}</div>
    </div>
  </div>
@endsection
