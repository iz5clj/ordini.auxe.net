@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Permessi
<a class="ml-1 btn btn-outline-primary" href="{{ route('permissionCreateForm') }}">Aggiungere un Permesso</a>
@endsection

@section('content')
<table class="table table-borderless table-sm">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Permesso</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($permissions as $permission)
        <thead>
            <tr class="table-info">
                <td>{{ $permission->id }}</td>
                <td><a href="{{ route('permissionModify', $permission->id) }}">{{ $permission->name }}</a></td>
            </tr>
        </thead>
        @empty
        <tr>
            <td colspan="2"><h3>Non sono stati creati dei permessi.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
