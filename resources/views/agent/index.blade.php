{{-- Agenti --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Agenti
<a class="ml-1 btn btn-outline-primary" href="{{ route('agents.create') }}">Aggiungere un Agente</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Cognome</th>
            <th scope="col">Fornitore</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($agents as $agent)
        <tr>
            <td>{{ $agent->id }}</td>
            <td><a href="{{ route('agents.edit', $agent->id) }}">{{ $agent->fullname }}</a></td>
            <td>{{ $agent->supplier->nome  ?? '' }}</td>
            <td>{{ $agent->email}}</td>
            <td>{{ $agent->tel }}</td>
            <td>
                <form action="{{ route('agents.destroy', $agent->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6"><h3>Non ci sono agenti.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
