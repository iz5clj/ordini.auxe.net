@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Utenti
<a class="ml-1 btn btn-outline-primary" href="{{ route('userCreateForm') }}">Aggiungere un Utente</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col"></th>
            <th scope="col">Nome Cognome</th>
            <th scope="col">Email</th>
            <th scope="col">Ruolo</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td><img src="/uploads/avatar/{{ $user->avatar }}" class="avatar"</td>
            <td><a href="{{ route('userModify', $user->id) }}">{{ $user->name }}</a></td>
            <td>{{ $user->email}}</td>
            <td>
                @if(!empty($user->getRoleNames()))
                    @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                    @endforeach
                @endif
            </td>
            <td>
                <form action="{{ route('userDestroy', $user->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5"><h3>Non ci sono utenti</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
