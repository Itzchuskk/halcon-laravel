@extends('layouts.base')
@section('title','Detalle Cliente')
@section('content')
<h1>{{ $customer->name }}</h1>
<p>Email: {{ $customer->email }}</p>
<p>Teléfono: {{ $customer->phone }}</p>
<p>Dirección: {{ $customer->address }}</p>
<p><a href="{{ route('customers.index') }}">Volver</a></p>
@endsection
