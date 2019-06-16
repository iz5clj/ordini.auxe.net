{{-- Ordini --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Ordini
<a class="ml-1 btn btn-outline-primary" href="{{ route('orders.create') }}">Creare un nuovo ordine</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Data creazione</th>
            <th scope="col">Stato</th>
            <th scope="col">Utente</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->creato_il }}</td>
            <td>{{ $order->stato }}</td>
            <td>{{ $order->user->name }}</td>
            <td>
                <form id="delete-order" action="{{ route('orders.destroy', $order->id) }}" method="post" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>
                <a class="btn btn-outline-secondary btn-sm" role="button" href="{{ route('orders.edit', $order->id) }}">Mostra</a>
                <a class="btn btn-outline-danger btn-sm" role="button" href="#" onclick="event.preventDefault();
                    document.getElementById('delete-order').submit();">Elimina</button>
            </td>
        </tr>
        <tr>
            <td></td>
            <td colspan="4">
            @foreach ( $order->lines as $line)
                @if ($line->order_id == $order->id)
                <div class="row">
                    <div class="col-sm-9 col-md-6">{{ $line->article->nome }}</div>
                    <div class="col-sm-3 col-md-6">{{ $line->quantita }}</div>
                </div>
                @endif
            @endforeach
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="5"><h3>Non ci sono ordini nel database.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
