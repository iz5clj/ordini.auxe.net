{{-- create or modify a role --}}

@include('partials.errors-in-form')

{{-- name --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="name">Ruolo</label>
    <div class="col-md-10">
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            value="{{ old('name') ? old('name') : $role->name }}"
        >
        @if($errors->has('name'))
        <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
        @else
        <small class="form-text text-muted">Nomde del ruolo da creare</small>
        @endif
    </div>
</div>

{{-- Permissions --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="name">Permessi</label>
    <div class="col-md-10">
        <div class="row">
            @foreach($permissions as $permission)
            <div class="col-sm-6 col-md-4">
                <div class="custom-control custom-checkbox">
                    <input 
                    type="checkbox" 
                    class="custom-control-input" 
                    id="permission-{{ $permission->name }}"
                    name="permission[]"
                    value="{{ $permission->id }}"
                    @if($action == 'modify')
                    {{ in_array($permission->id, $rolePermissions) ? "checked" : false }}
                    @endif
                    >
                    <label class="custom-control-label" for="permission-{{ $permission->name }}">
                        {{ $permission->name }}
                    </label>
                </div>
            </div>
            @endforeach
        </div>
        <small class="form-text text-muted">Scegliere i permessi per questo ruolo.</small>
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
