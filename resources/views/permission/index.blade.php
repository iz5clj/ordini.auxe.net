@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Permessi
<a class="ml-1 btn btn-outline-success" href="{{ route('permissionCreateForm') }}">Aggiungere un Permesso</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Permesso</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td><a href="{{ route('permissionModify', $permission->id) }}">{{ $permission->name }}</a></td>
            <td>
                <form action="{{ route('permissionDestroy', $permission->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3"><h3>Non sono stati creati dei permessi.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
