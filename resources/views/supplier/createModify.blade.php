{{-- Fornitori --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Fornitore
@else
Modifica Fornitore
@endif
@endsection

@section('content')
    {{-- We create a new supplier --}}
    @if( $action == 'create')
    <form action="{{ route('suppliers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('supplier._form')
    </form>

    {{-- we modify a supplier --}}
    @else
    <form action="{{ route('suppliers.update', $supplier->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('supplier._form')
    </form>
    @endif
</div>
@endsection

