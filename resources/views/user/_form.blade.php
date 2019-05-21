{{-- create or modify a user --}}

@include('partials.errors-in-form')

{{-- name --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="name">Nome Cognome</label>
    <div class="col-md-10">
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
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
    <label class="col-md-2 label-form field-required text-md-right" for="email">Email</label>
    <div class="col-md-10">
        <input
            type="text"
            class="form-control @error('email') is-invalid @enderror"
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

{{-- Password --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label field-required text-md-right" for="password">Password</label>

    <div class="col-md-10">
        <input 
            id="password" 
            type="password"
            class="form-control @error('password') is-invalid @enderror" 
            name="password"
            required 
        >
        @if($errors->has('password'))
        <small class="form-text invalid-feedback">{{ $errors->first('password') }}</small>
        @else
        <small class="form-text text-muted">Password da usare</small>
        @endif
    </div>
</div>

{{-- Password confirm --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label field-required text-md-right" for="confirm-password">Conferma password</label>

    <div class="col-md-10">
        <input 
            id="password-confirm" 
            type="password" 
            class="form-control"
            name="confirm-password"
            required
        >
    </div>
</div>

{{-- Role to assign --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label field-required text-md-right" for="role">Ruolo</label>
    <div class="col-md-10">
        <select id="role" name="role" class="form-control">
            @foreach($roles as $role)
                <option
                    value="{{ $role }}"
                    @if($userRole == $role) selected="selected" @endif
                >{{ $role }}
            @endforeach
        </select>
        @if($errors->has('role'))
            <small class="form-text invalid-feedback">{{ $errors->first('role') }}</small>
        @else
            <small class="form-text text-muted">Scegliere il ruolo per quest'utente</small>
        @endif
    </div>
</div>


{{--  Button to submit  --}}
<div class="form-group row">
    <div class="col-md-10 offset-md-2 offset-lg-2">
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <button type="submit" class="btn btn-primary btn-block">
                    Conferma
                </button>
            </div>
            @if ($action === 'create')
            <div class="col-sm-12 col-md-4 pt-sm-1">
                <button type="submit" class="btn btn-secondary btn-block" name="submitButton" value="submitAndAdd">
                    Conferma e Nuovo
                </button>
            </div>
            @endif
            <div class="col-sm-12 col-md-4 pt-sm-1">
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