@extends('layouts.admin')
@section('title', 'Order #'.$order->id)
@section('page_title', 'Order Details')
@section('content')
  <div class="grid lg:grid-cols-3 gap-6">
    {{-- LEFT SIDE: ORDER INFO + EVIDENCE --}}
    <div class="lg:col-span-2 space-y-6">

      {{-- Order Details --}}
      <div class="card">
        <div class="card-body">
          <h2 class="text-lg font-semibold mb-4">Order Information</h2>
          <div class="grid md:grid-cols-2 gap-4">
            <div>
              <div class="text-xs text-gray-500">Invoice</div>
              <div class="font-medium">{{ $order->invoice_number }}</div>
            </div>
            <div>
              <div class="text-xs text-gray-500">Customer</div>
              <div>{{ $order->customer?->name }}</div>
            </div>
            <div>
              <div class="text-xs text-gray-500">Delivery Address</div>
              <div>{{ $order->delivery_address }}</div>
            </div>
            <div>
              <div class="text-xs text-gray-500">Status</div>
              <span class="px-2 py-1 rounded-full text-xs bg-gray-100 border">
                {{ ucfirst($order->status) }}
              </span>
            </div>
            @if($order->notes)
              <div class="md:col-span-2">
                <div class="text-xs text-gray-500">Notes</div>
                <div>{{ $order->notes }}</div>
              </div>
            @endif
          </div>
        </div>
      </div>

      {{-- Evidence Photos --}}
      <div class="card">
        <div class="card-body">
          <div class="flex items-center justify-between mb-3">
            <div class="font-medium text-lg">Evidence Photos</div>
          </div>

          @if($order->evidencePhotos->count())
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
              @foreach($order->evidencePhotos as $p)
                <div class="rounded-xl overflow-hidden border group relative">
                  <img src="{{ asset('storage/'.$p->photo_path) }}" alt="evidence"
                       class="w-full h-40 object-cover group-hover:opacity-90">
                  <div class="p-3 text-sm flex items-center justify-between bg-white">
                    <div>
                      <div class="font-medium capitalize">{{ $p->photo_type ?? 'Evidence' }}</div>
                      <div class="text-gray-500">{{ $p->notes }}</div>
                    </div>
                    <form action="{{ route('evidence.destroy',$p) }}" method="POST">
                      @csrf @method('DELETE')
                      <button class="btn-danger text-xs" onclick="return confirm('Delete this photo?')">
                        Delete
                      </button>
                    </form>
                  </div>
                </div>
              @endforeach
            </div>
          @else
            <div class="text-sm text-gray-600">No photos uploaded yet.</div>
          @endif
        </div>
      </div>
    </div>

    {{-- RIGHT SIDE: UPLOAD FORM --}}
    <div class="space-y-6">
      <div class="card">
        <div class="card-body">
          <h2 class="text-lg font-semibold mb-3">Upload Evidence</h2>
          <form method="POST" action="{{ route('evidence.store') }}" enctype="multipart/form-data" class="space-y-3">
            @csrf
            <input type="hidden" name="order_id" value="{{ $order->id }}">

            <div>
              <label class="block text-sm mb-1">Photo</label>
              <input class="input" type="file" name="photo" accept="image/*" required>
            </div>

            <div>
              <label class="block text-sm mb-1">Photo Type</label>
              <input class="input" name="photo_type" placeholder="e.g. pickup, delivery">
            </div>

            <div>
              <label class="block text-sm mb-1">Notes</label>
              <input class="input" name="notes" placeholder="Optional notes">
            </div>

            <button class="btn-primary w-full">Upload</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
