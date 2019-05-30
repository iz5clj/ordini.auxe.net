{{-- create or modify a permission --}}

@include('partials.errors-in-form')

{{-- name --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="name">Permesso</label>
    <div class="col-md-10">
        <input
            type="text"
            class="form-control @error('name') is-invalid @enderror"
            name="name"
            value="{{ old('name') ? old('name') : $permission->name }}"
        >
        @if($errors->has('name'))
        <small class="form-text invalid-feedback">{{ $errors->first('name') }}</small>
        @else
        <small class="form-text text-muted">Nomde del permesso da creare</small>
        @endif
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