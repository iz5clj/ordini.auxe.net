@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Utente
@else
Modifica Utente
@endif
@endsection

@section('content')
    {{-- We create a new user --}}
    @if( $action == 'create')
    <form action="{{ route('userStore') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @include('user._form')
    </form>

    {{-- we modify a user --}}
    @else
    <form action="{{ route('userStore', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        @include('user._form')
    </form>
    @endif
</div>
@endsection
