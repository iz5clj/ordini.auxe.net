@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Ruoli
<a class="ml-1 btn btn-outline-primary" href="{{ route('roleCreateForm') }}">Aggiungere un Ruolo</a>
@endsection

@section('content')
<table class="table table-borderless table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ruolo</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
        <thead>
            <tr class="table-info">
                <td>{{ $role->id }}</td>
                <td><a href="{{ route('roleModify', $role->id) }}">{{ $role->name }}</a></td>
            </tr>
        </thead>
        @empty
        <tr>
            <td colspan="2"><h3>Non sono stati creati dei ruoli.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
