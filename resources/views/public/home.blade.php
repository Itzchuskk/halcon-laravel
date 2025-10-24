@extends('layouts.public')
@section('title','Home')
@section('content')
  <div class="grid md:grid-cols-2 gap-6">
    <div class="card">
      <div class="card-body">
        <h1 class="text-xl font-semibold mb-2">Welcome to Halcon</h1>
        <p class="text-gray-600">
          Track your delivery using the invoice number provided on your receipt.
        </p>
        <a class="btn-primary mt-4 inline-flex" href="{{ route('public.track') }}">
          Track Order
        </a>
      </div>
    </div>

    <div class="card">
      <div class="card-body">
        <h2 class="text-base font-semibold mb-2">How it works</h2>
        <ol class="list-decimal pl-5 space-y-1 text-sm text-gray-700">
          <li>Enter your invoice number.</li>
          <li>See current status and delivery details.</li>
          <li>Optionally attach notes for support.</li>
        </ol>
      </div>
    </div>
  </div>
@endsection
