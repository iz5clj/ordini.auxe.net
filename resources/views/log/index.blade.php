@extends('layouts.main', [
    'viewMenu'  => true,
    'viewCard'  => true
])

@section('card-header')
Logs
@endsection

@section('content')
<table class="table table-borderless table-sm">
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
        <thead>
            <tr class="table-info">
                <td>{{ $log->id }}</td>
                <td>{{ $log->description }}</td>
                <td>{{ $log->subject_type }}</td>
                <td>{{ $log->subject }}</td>
                <td>{{ Carbon\Carbon::parse($log->created_at)->format('d/m/Y H:i') }}</td>
            </tr>
        </thead>
        @empty
        <tr>
            <td colspan="3"><h3>Il file dei log è vuoto.</h3></td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection
