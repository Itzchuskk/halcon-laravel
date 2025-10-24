@extends('layouts.admin')
@section('title', 'Create Order')
@section('page_title', 'Create Order')

@section('content')
  <div class="max-w-3xl">
    @if ($errors->any())
      <div class="mb-4 card">
        <div class="card-body text-sm text-rose-700">
          <div class="font-semibold mb-1">Please fix the following:</div>
          <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      </div>
    @endif

    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('orders.store') }}" class="space-y-4">
          @csrf

          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Invoice Number</label>
              <input class="input" name="invoice_number" value="{{ old('invoice_number') }}" required>
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Customer</label>
              <select class="select" name="customer_id" required>
                <option value="" disabled selected>Select a customer</option>
                @foreach($customers as $c)
                  <option value="{{ $c->id }}" @selected(old('customer_id') == $c->id)>{{ $c->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Delivery Address</label>
            <input class="input" name="delivery_address" value="{{ old('delivery_address') }}" required>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Notes</label>
            <textarea class="textarea" name="notes">{{ old('notes') }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select class="select" name="status" required>
              @foreach(['ordered','processed','routed','delivered','cancelled'] as $st)
                <option value="{{ $st }}" @selected(old('status') === $st)>{{ ucfirst($st) }}</option>
              @endforeach
            </select>
          </div>

          <div class="flex gap-3 pt-4">
            <button class="btn-primary" type="submit">Create</button>
            <a class="btn" href="{{ route('orders.index') }}">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
