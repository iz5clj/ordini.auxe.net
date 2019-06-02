{{-- Agent --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Agente
@else
Modifica Agente
@endif
@endsection

@section('content')
    {{-- We create a new agent --}}
    @if( $action == 'create')
    <form action="{{ route('agents.store') }}" method="POST">
        @csrf
        @include('agent._form')
    </form>

    {{-- we modify a agent --}}
    @else
    <form action="{{ route('agents.update', $agent->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('agent._form')
    </form>
    @endif
</div>
@endsection

