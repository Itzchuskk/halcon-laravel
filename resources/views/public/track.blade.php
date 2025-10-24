@extends('layouts.public')
@section('title','Track Order')
@section('content')
  <div class="card max-w-2xl">
    <div class="card-body">
      <h1 class="text-xl font-semibold mb-4">Track your order</h1>

      <form method="GET" action="{{ route('public.track') }}" class="flex flex-col sm:flex-row gap-3">
        <input class="input flex-1" name="invoice_number"
               value="{{ request('invoice_number') }}"
               placeholder="Enter your invoice number" required>
        <button class="btn-primary" type="submit">Search</button>
      </form>

      @if(request()->filled('invoice_number'))
        <hr class="my-5">

        @if($order)
          <div class="space-y-3">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <div class="text-xs text-gray-500">Invoice</div>
                <div class="font-medium">{{ $order->invoice_number }}</div>
              </div>
              <div>
                <div class="text-xs text-gray-500">Status</div>
                <span class="px-2 py-1 rounded-full text-xs bg-gray-100 border">
                  {{ ucfirst($order->status) }}
                </span>
              </div>
              <div>
                <div class="text-xs text-gray-500">Customer</div>
                <div>{{ $order->customer?->name }}</div>
              </div>
              <div>
                <div class="text-xs text-gray-500">Delivery address</div>
                <div>{{ $order->delivery_address }}</div>
              </div>
            </div>

            @if($order->evidencePhotos->count())
              <div>
                <div class="text-sm font-medium mb-2">Latest photos</div>
                <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-3">
                  @foreach($order->evidencePhotos->take(6) as $p)
                    <img class="rounded-lg border object-cover w-full h-36"
                         src="{{ asset('storage/'.$p->photo_path) }}" alt="evidence">
                  @endforeach
                </div>
              </div>
            @endif
          </div>
        @else
          <div class="text-sm text-gray-600 mt-4">
            No results for <span class="font-medium">“{{ request('invoice_number') }}”</span>.
            Please verify your invoice number and try again.
          </div>
        @endif
      @endif
    </div>
  </div>
@endsection
