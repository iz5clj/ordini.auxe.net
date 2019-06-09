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
        src="{{ ($action === 'create') ? "/uploads/foto/default.png" : "/uploads/foto/$article->foto" }}" 
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

{{-- descrizione --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="descrizione">Descrizione</label>
    <div class="col-md-10">
        <input type="text" class="form-control @error('descrizione') is-invalid @enderror" name="descrizione"
            value="{{ old('descrizione') ? old('descrizione') : $article->descrizione }}">
        @if($errors->has('descrizione'))
        <small class="form-text invalid-feedback">{{ $errors->first('descrizione') }}</small>
        @else
        <small class="form-text text-muted">Descrizione dell'articolo.</small>
        @endif
    </div>
</div>

{{-- prezzo --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="prezzo">Prezzo</label>
    <div class="col-md-10">
        <input 
            type="number"
            step="0.01"
            class="form-control @error('descrizione') is-invalid @enderror" 
            name="prezzo"
            value="{{ old('prezzo') ? old('prezzo') : $article->prezzo }}"
            title="Si puo usare indiferentemente la virgola o il punto come separatore della parte decimale."
        >
        @if($errors->has('prezzo'))
        <small class="form-text invalid-feedback">{{ $errors->first('prezzo') }}</small>
        @else
        <small class="form-text text-muted">Descrizione dell'articolo.</small>
        @endif
    </div>
</div>

{{-- quantita minima --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="quantitaminima">Quantità minima</label>
    <div class="col-md-10">
        <input 
            type="number"
            step="1"
            class="form-control @error('quantitaminima') is-invalid @enderror" 
            name="quantitaminima"
            value="{{ old('quantitaminima') ? old('quantitaminima') : $article->quantitaminima }}"
        >
        @if($errors->has('quantitaminima'))
        <small class="form-text invalid-feedback">{{ $errors->first('quantitaminima') }}</small>
        @else
        <small class="form-text text-muted">Quantità minima da ordinare.</small>
        @endif
    </div>
</div>

{{-- quantita per imballo --}}
<div class="form-group row">
    <label class="col-md-2 text-md-right label-form" for="quantitaximballo">Quantità per imbalaggio</label>
    <div class="col-md-10">
        <input 
            type="number"
            step="1"
            class="form-control @error('quantitaximballo') is-invalid @enderror" 
            name="quantitaximballo"
            value="{{ old('quantitaximballo') ? old('quantitaximballo') : $article->quantitaximballo }}"
        >
        @if($errors->has('quantitaximballo'))
        <small class="form-text invalid-feedback">{{ $errors->first('quantitaximballo') }}</small>
        @else
        <small class="form-text text-muted">Quantità in un imbalaggio.</small>
        @endif
    </div>
</div>
        
    

{{-- supplier --}}
<div class="form-group row">
    <label class="col-md-2 col-form-label field-required text-md-right" for="role">Fornitore</label>
    <div class="col-md-10">
        <select id="supplier_id" name="supplier_id" class="form-control js-select2">
            @foreach($suppliers as $key => $supplier)
            <option
                value="{{ $key }}"
                @if($actualSupplier == $key) selected="selected" @endif --}}
            >{{ $supplier }}
            @endforeach
        </select>
        @if($errors->has('supplier_id'))
            <small class="form-text invalid-feedback">{{ $errors->first('supplier_id') }}</small>
        @else
            <small class="form-text text-muted">Scegliere il fornitore di quest'articolo.</small>
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
