{{-- Logs --}}

@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Logs
@endsection

@section('content')
<table class="table table-borderless table-striped">
    <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Descrizione</th>
            <th scope="col">Model</th>
            <th scope="col">Subject</th>
            <th scope="col">Data</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($logs as $log)
        <tr>
            <td>{{ $log->id }}</td>
            <td>{{ $log->description }}</td>
            <td>{{ $log->subject_type }}</td>
            <td>{{ $log->subject }}</td>
            <td>{{ Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</td>
        </tr>
        @empty
        <tr>
            <td colspan="5"><h3>Il file dei log è vuoto.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>

<div class="d-flex">
    <div class="mx-auto justify-content-center">
        {{ $logs->links() }}
    </div>
</div>

@endsection
