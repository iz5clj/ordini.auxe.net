@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Ruolo
@else
Modifica Ruolo
@endif
@endsection

@section('content')
    {{-- We create a new role --}}
    @if( $action == 'create')
    <form action="{{ route('roleStore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('role._form')
    </form>

    {{-- we modify a role --}}
    @else
    <form action="{{ route('userStore', $role->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('role._form')
    </form>
    @endif
</div>
@endsection
