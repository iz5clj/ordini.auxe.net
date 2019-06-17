@extends('layouts.main', [
'viewMenu' => true,
'viewCard' => true
])

@section('card-header')
Panello di controllo
@endsection

@section('content')
<div class="row">
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ordini</h5>
                <h6 class="card-subtitle mb-2 text-muted">Ordini inviati non ancora ricevuti</h6>
                <p class="card-text">Non ci sono ordini in attesa.</p>
                {{-- <a href="#" class="card-link">Card link</a> --}}
                {{-- <a href="#" class="card-link">Another link</a> --}}
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Ordini</h5>
                <h6 class="card-subtitle mb-2 text-muted">Ordini da confermare</h6>
                <ul class="list-group">
                    @foreach ($suppliers as $supplier)
                    <li class="list-group-item">{{ $supplier->fo_nome }}<br> Agente: {{ $supplier->ag_nome }}</li>
                    <table class="table table-borderless">
                        @foreach ($lines as $line)
                        <tr>
                            @if( $line->article->supplier_id == $supplier->fo_id)
                            <td>{{ $line->article->nome }}</td>
                            <td>{{ $line->quantita }}</td>
                            @endif
                        </tr>
                        @endforeach
                    </table>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div> {{-- row --}}
@endsection
