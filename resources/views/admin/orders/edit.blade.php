@extends('layouts.admin')
@section('title', 'Edit Order')
@section('page_title', 'Edit Order')
@section('content')
  <div class="max-w-3xl">
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('orders.update', $order) }}" class="space-y-4">
          @csrf
          @method('PUT')

          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <label class="block text-sm font-medium mb-1">Invoice Number</label>
              <input class="input" name="invoice_number" value="{{ old('invoice_number', $order->invoice_number) }}" required>
            </div>

            <div>
              <label class="block text-sm font-medium mb-1">Customer</label>
              <select class="select" name="customer_id" required>
                @foreach($customers as $c)
                  <option value="{{ $c->id }}" @selected($order->customer_id == $c->id)>
                    {{ $c->name }}
                  </option>
                @endforeach
              </select>
            </div>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Delivery Address</label>
            <input class="input" name="delivery_address" value="{{ old('delivery_address', $order->delivery_address) }}" required>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Notes</label>
            <textarea class="textarea" name="notes">{{ old('notes', $order->notes) }}</textarea>
          </div>

          <div>
            <label class="block text-sm font-medium mb-1">Status</label>
            <select class="select" name="status" required>
              @foreach(['ordered','processed','routed','delivered','cancelled'] as $st)
                <option value="{{ $st }}" @selected($order->status === $st)>
                  {{ ucfirst($st) }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="flex gap-3 pt-4">
            <button class="btn-primary" type="submit">Update</button>
            <a class="btn" href="{{ route('orders.index') }}">Cancel</a>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
