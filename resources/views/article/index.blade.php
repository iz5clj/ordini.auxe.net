{{-- Articoli --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Articoli
<a class="ml-1 btn btn-outline-primary" href="{{ route('articles.create') }}">Aggiungere un Articolo</a>
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col"></th>
            <th scope="col">Nome</th>
            <th scope="col">Fornitore</th>
            <th scope="col">Prezzo</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Azione</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($articles as $article)
        <tr>
            <td><img src="/uploads/foto/{{ $article->foto }}" class="avatar"</td>
            <td><a href="{{ route('articles.edit', $article->id) }}">{{ $article->nome }}</a></td>
            <td>{{ $article->supplier->nome  ?? '' }}</td>
            <td align="right">{{ number_format( $article->prezzo, 2, ",", ".") }}</td>
            <td>{{ $article->descrizione }}</td>
            <td>
                <form action="{{ route('articles.destroy', $article->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger btn-sm">Elimina</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6"><h3>Non ci sono articoli.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
