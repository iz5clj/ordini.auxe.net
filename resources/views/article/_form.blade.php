{{-- create or modify an article --}}

@include('partials.errors-in-form')

{{-- referenza --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="ref">Referenza</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('ref') is-invalid @enderror" name="ref"
            value="{{ old('ref') ? old('ref') : $article->ref }}">
        @if($errors->has('ref'))
        <small class="form-text invalid-feedback">{{ $errors->first('ref') }}</small>
        @else
        <small class="form-text text-muted">Referenza dell'articolo.</small>
        @endif
    </div>
</div>

{{-- nome --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form field-required " for="nome">Nome</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('nome') is-invalid @enderror" name="nome"
            value="{{ old('nome') ? old('nome') : $article->nome }}">
        @if($errors->has('nome'))
        <small class="form-text invalid-feedback">{{ $errors->first('nome') }}</small>
        @else
        <small class="form-text text-muted">nome dell'articolo.</small>
        @endif
    </div>
</div>

{{-- foto --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label text-md-right" for="role">foto</label>
    <div class="col-md-10">
        <img 
        src="{{ ($action === 'create') ? "/uploads/foto/default.png" : "/uploads/foto/$user->foto" }}" 
        id="profile-img-tag" 
        width="175px" />
    </div>
</div>

{{-- foto file upload --}}
<div class="form-group row">
    <div class="col-md-10 offset-md-2">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="foto">
            <label class="custom-file-label" for="customFile" data-browse="Archivi locali">Scegliere una foto</label>
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
            @if(old('active', $article->active))
            checked
            @endif
            >
            <label class="custom-control-label" for="active">Attivo(Si / No)</label>
            <small class="form-text text-muted">Per ora non usato.</small>
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
