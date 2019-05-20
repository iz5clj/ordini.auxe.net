{{-- create or modify a user --}}

@include('partials.errors-in-form')

{{-- name --}}
<div class="form-group row">
    <div class="col-md-3 col-lg-2">
        <label class="label-form field-required" for="name">Nome Cognome</label>
    </div>
    <div class="col-md-6">
        <input
            type="text"
            class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
            name="name"
            value="{{ old('name') ? old('name') : $user->name }}"
        >
        @if($errors->has('name'))
        <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
        @else
        <small class="form-text text-muted">Nome e Cognome dell'utente</small>
        @endif
    </div>
</div>

{{-- email --}}
<div class="form-group row">
    <div class="col-md-3 col-lg-2">
        <label class="label-form field-required" for="email">Email</label>
    </div>
    <div class="col-md-6">
        <input
            type="text"
            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
            name="email"
            value="{{ old('email') ? old('email') : $user->email }}"
        >
        @if($errors->has('email'))
        <small class="form-text invalid-feedback">{{ $errors->first('email') }}</small>
        @else
        <small class="form-text text-muted">Email dell'utente</small>
        @endif
    </div>
</div>

{{--  Button to submit  --}}
<div class="form-group row">
    <div class="col-md-6 offset-md-3 offset-lg-2">
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-primary btn-block">
                    Conferma
                </button>
            </div>
            @if ($action === 'create')
            <div class="col">
                <button type="submit" class="btn btn-secondary btn-block" name="submitButton" value="submitAndAdd">
                    Conferma crea altro
                </button>
            </div>
            @endif
            <div class="col">
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