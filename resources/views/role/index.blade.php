@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Ruoli
<a class="ml-1 btn btn-outline-success" href="{{ route('roleCreateForm') }}">Aggiungere un Ruolo</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Ruolo</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($roles as $role)
        <tr>
            <td>{{ $role->id }}</td>
            <td scope="row"><a href="{{ route('roleModify', $role->id) }}">{{ $role->name }}</a></td>
            <td>
            <form action="{{ route('roleDestroy', $role->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
            </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="2"><h3>Non sono stati creati dei ruoli.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
