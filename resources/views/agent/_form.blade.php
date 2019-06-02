{{-- create or modify a agent --}}

@include('partials.errors-in-form')

{{-- nome --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="nome">Nome</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
            value="{{ old('nome') ? old('nome') : $agent->nome }}">
        @if($errors->has('nome'))
        <small class="form-text invalid-feedback">{{ $errors->first('nome') }}</small>
        @else
        <small class="form-text text-muted">Nome dell'agente</small>
        @endif
    </div>
</div>

{{-- cognome --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="cognome">Cognome</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('cognome') is-invalid @enderror" name="cognome"
            value="{{ old('cognome') ? old('cognome') : $agent->cognome }}">
        @if($errors->has('cognome'))
        <small class="form-text invalid-feedback">{{ $errors->first('cognome') }}</small>
        @else
        <small class="form-text text-muted">Cognome dell'agente</small>
        @endif
    </div>
</div>

{{-- tel --}}
<div class="form-group row">
    <label class="col-md-2 label-form field-required text-md-right" for="tel">Telefono</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('tel') is-invalid @enderror" name="tel"
            value="{{ old('tel') ? old('tel') : $agent->tel }}">
        @if($errors->has('tel'))
        <small class="form-text invalid-feedback">{{ $errors->first('tel') }}</small>
        @else
        <small class="form-text text-muted">Telefono dell'agente.</small>
        @endif
    </div>
</div>

{{-- email --}}
<div class="form-group row">
    <label class="col-md-2 label-form field-required text-md-right" for="email">Email</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
            value="{{ old('email') ? old('email') : $agent->email }}">
        @if($errors->has('email'))
        <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
        @else
        <small class="form-text text-muted">Email dell'agente</small>
        @endif
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
            @if(old('active', $agent->active))
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
