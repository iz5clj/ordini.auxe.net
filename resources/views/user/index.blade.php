@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Utenti
<a class="ml-1 btn btn-outline-primary" href="{{ route('userCreateForm') }}">Aggiungere un Utente</a>
@endsection

@section('content')
<table class="table table-borderless table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome Cognome</th>
            <th scope="col">Email</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <thead>
            <tr class="table-info">
                <td>{{ $user->id }}</td>
                <td><a href="{{ route('userModify', $user->id) }}">{{ $user->name }}</a></td>
                <td>{{ $user->email}}</td>
            </tr>
        </thead>
        @empty
        <tr>
            <td colspan="3"><h3>Non ci sono utenti</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
