{{-- Roles --}}
@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Permesso
@else
Modifica Permesso
@endif
@endsection

@section('content')
    {{-- We create a new role --}}
    @if( $action == 'create')
    <form action="{{ route('permissionStore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('permission._form')
    </form>

    {{-- we modify a permission --}}
    @else
    <form action="{{ route('permissionUpdate', $permission->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('permission._form')
    </form>
    @endif
</div>
@endsection
