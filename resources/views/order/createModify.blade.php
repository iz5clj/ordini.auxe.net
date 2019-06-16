{{-- Ordini --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Ordine
@else
Modifica Ordine 
@endif
@endsection

@section('content')
    {{-- We create a new order --}}
    @if( $action == 'create')
    <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('order._form')
    </form>

    {{-- we modify an existing order --}}
    @else
    <form action="{{ route('orders.update', $order->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('order._form')
    </form>
    @endif
</div>
@endsection

