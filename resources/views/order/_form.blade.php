{{-- create or modify a order --}}

@include('partials.errors-in-form')

<div class="form-group row">
    <table class="table table-borderless" id="dynamic_field">
        <tr>
            <td><select name="article_list[]" id="article_list" class="form-control component" style="width:100%;"></select></td>
            <td><input type="text" name="qta[]" placeholder="Quantità" class="form-control" /></td>
            <td><button type="button" name="add" id="add" class="btn btn-success">Aggiungi</button></td>
        </tr>
    </table>
</div>

{{--  Button to submit  --}}
<div class="form-group row">
    <div class="col-sm-12 col-md-4 pt-1">
        <button type="submit" class="btn btn-primary btn-block">
            Conferma
        </button>
    </div>
    <div class="col-sm-12 col-md-4 pt-1">
        <a class="btn btn-outline-danger btn-block" href="{{ URL::previous() }}">
            Cancella
        </a>
    </div>
</div>
