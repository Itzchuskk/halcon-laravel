@extends('layouts.base')
@section('title','Editar Cliente')
@section('content')
<h1>Editar Cliente</h1>
<form method="POST" action="{{ route('customers.update',$customer) }}">
  @csrf @method('PUT')
  <label>Nombre</label><input name="name" value="{{ $customer->name }}">
  <label>Email</label><input name="email" value="{{ $customer->email }}">
  <label>Teléfono</label><input name="phone" value="{{ $customer->phone }}">
  <label>Dirección</label><input name="address" value="{{ $customer->address }}">
  <button type="submit">Actualizar</button>
</form>
@endsection
