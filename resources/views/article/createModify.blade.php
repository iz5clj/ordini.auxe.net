{{-- Article --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
@if( $action == 'create')
Nuovo Articolo
@else
Modifica Articolo
@endif
@endsection

@section('content')
    {{-- We create a new article --}}
    @if( $action == 'create')
    <form action="{{ route('articles.store') }}" method="POST">
        @csrf
        @include('article._form')
    </form>

    {{-- we modify a article --}}
    @else
    <form action="{{ route('articles.update', $article->id) }}" method="POST">
        @csrf
        @method('PUT')
        @include('article._form')
    </form>
    @endif
</div>
@endsection

