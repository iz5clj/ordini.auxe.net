{{-- Fornitori --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Fornitori
<a class="ml-1 btn btn-outline-primary" href="{{ route('suppliers.create') }}">Aggiungere un fornitore</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Agente</th>
            <th scope="col">Logo</th>
            <th scope="col">Email</th>
            <th scope="col">Telefono</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td><a href="{{ route('suppliers.edit', $supplier->id) }}">{{ $supplier->nome }}</a></td>
            <td>{{ $supplier->agent->fullname }}</td>
            <td><img class="avatar" src="/uploads/logo/{{ $supplier->logo }}" alt="logo di {{ $supplier->nome}}"></td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->tel }}</td>
            <td>
                <form action="{{ route('suppliers.destroy', $supplier->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7"><h3>Non ci sono fornitori nel database.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
