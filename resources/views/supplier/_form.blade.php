{{-- create or modify a supplier --}}

@include('partials.errors-in-form')

{{-- nome --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="nome">Nome</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
            value="{{ old('nome') ? old('nome') : $supplier->nome }}">
        @if($errors->has('nome'))
        <small class="form-text invalid-feedback">{{ $errors->first('nome') }}</small>
        @else
        <small class="form-text text-muted">Nome del fornitore</small>
        @endif
    </div>
</div>

{{-- indirizzo1 --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="indirizzo1">Indirizzo (1)</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('indirizzo1') is-invalid @enderror" name="indirizzo1"
            value="{{ old('indirizzo1') ? old('indirizzo1') : $supplier->indirizzo1 }}">
        @if($errors->has('indirizzo1'))
        <small class="form-text invalid-feedback">{{ $errors->first('indirizzo1') }}</small>
        @else
        <small class="form-text text-muted">Prima riga dell'indirizzo.</small>
        @endif
    </div>
</div>

{{-- indirizzo2 --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="indirizzo2">Indirizzo (2)</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('indirizzo2') is-invalid @enderror" name="indirizzo2"
            value="{{ old('indirizzo2') ? old('indirizzo2') : $supplier->indirizzo2 }}">
        @if($errors->has('indirizzo2'))
        <small class="form-text invalid-feedback">{{ $errors->first('indirizzo2') }}</small>
        @else
        <small class="form-text text-muted">Seconda riga dell'indirizzo.</small>
        @endif
    </div>
</div>

{{-- citta --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="citta">Città</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('citta') is-invalid @enderror" name="citta"
            value="{{ old('citta') ? old('citta') : $supplier->citta }}">
        @if($errors->has('citta'))
        <small class="form-text invalid-feedback">{{ $errors->first('citta') }}</small>
        @else
        <small class="form-text text-muted">Città del fornitore.</small>
        @endif
    </div>
</div>

{{-- cap --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="cap">Cap</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('cap') is-invalid @enderror" name="cap"
            value="{{ old('cap') ? old('cap') : $supplier->cap }}">
        @if($errors->has('cap'))
        <small class="form-text invalid-feedback">{{ $errors->first('cap') }}</small>
        @else
        <small class="form-text text-muted">Codice Avviamento Postale del fornitore.</small>
        @endif
    </div>
</div>

{{-- Paese da lista --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right" for="role">Paese</label>
    <div class="col-md-10">
        <select id="paese" name="paese" class="form-control js-select2">
            @foreach($countries as $country)
                <option
                    value="{{ $country }}"
                    @if($supplier->paese == $country) selected="selected" @endif
                >{{ $country }}
            @endforeach
        </select>
        @if($errors->has('paese'))
            <small class="form-text invalid-feedback">{{ $errors->first('paese') }}</small>
        @else
            <small class="form-text text-muted">Paese del fornitore.</small>
        @endif
    </div>
</div>

{{-- tel --}}
<div class="form-group row">
    <label class="col-md-2 label-form field-required text-md-right" for="tel">Telefono</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel"
            value="{{ old('tel') ? old('tel') : $supplier->tel }}">
        @if($errors->has('tel'))
        <small class="form-text invalid-feedback">{{ $errors->first('tel') }}</small>
        @else
        <small class="form-text text-muted">Telefono del fornitore.</small>
        @endif
    </div>
</div>

{{-- email --}}
<div class="form-group row">
    <label class="col-md-2 label-form field-required text-md-right" for="email">Email</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') ? old('email') : $supplier->email }}">
        @if($errors->has('email'))
        <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
        @else
        <small class="form-text text-muted">Email del fornitore.</small>
        @endif
    </div>
</div>

{{-- agent --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label field-required text-md-right" for="role">Agente</label>
    <div class="col-md-10">
        <select id="agent_id" name="agent_id" class="form-control js-select2">
            @foreach($agents as $key => $agent)
            <option
                value="{{ $key }}"
                @if($actualAgent == $key) selected="selected" @endif --}}
            >{{ $agent }}
            @endforeach
        </select>
        @if($errors->has('agent_id'))
            <small class="form-text invalid-feedback">{{ $errors->first('agent_id') }}</small>
        @else
            <small class="form-text text-muted">Scegliere l'agente per questo fornitore</small>
        @endif
    </div>
</div>

{{-- logo --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right" for="logo">Logo</label>
    <div class="col-md-10">
        <img 
        src="{{ ($action === 'create') ? "/uploads/logo/default.png" : "/uploads/logo/$supplier->logo" }}" 
        id="profile-img-tag" 
        width="75px" />
    </div>
</div>

{{-- logo file upload --}}
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="logo">
            <label class="custom-file-label" for="customFile" data-browse="Archivi locali">Logo del fornitore.</label>
        </div>
    </div>
</div>

{{-- active --}}
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <div class="custom-control custom-checkbox ">
            <input 
            type="checkbox" 
            class="custom-control-input" 
            id="active" 
            name="active"
            @if(old('active', $supplier->active))
            checked
            @endif
            >
            <label class="custom-control-label" for="active">Attivo(Si / No)</label>
        </div>
    </div>
</div>

{{--  Button to submit  --}}
<div class="form-group row">
    <div class="col-md-10 offset-md-2 offset-lg-2">
        <div class="row">
            <div class="col-sm-12 col-md-4 pt-1">
                <button type="submit" class="btn btn-primary btn-block">
                    Conferma
                </button>
            </div>
            @if ($action === 'create')
            <div class="col-sm-12 col-md-4 pt-1">
                <button type="submit" class="btn btn-secondary btn-block" name="submitButton" value="submitAndAdd">
                    Conferma e Nuovo
                </button>
            </div>
            @endif
            <div class="col-sm-12 col-md-4 pt-1">
                <a class="btn btn-outline-danger btn-block" href="{{ URL::previous() }}">
                    Cancella
                </a>
            </div>
        </div>
        <p class="text-muted mt-3">
            (<span class="text-danger">*</span>) Campi richiesti
        </p>
    </div>
</div>
