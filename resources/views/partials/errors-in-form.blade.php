@if($errors->any())
<div class="form-group row" id="flash-message">
    <div class="col-md-10 offset-md-2">
        <div class="alert alert-danger" role="alert">
            <div class="alert-icon">
                <i class="now-ui-icons objects_support-17"></i>
            </div>

            Errore.

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">
                    <i class="now-ui-icons ui-1_simple-remove"></i>
                </span>
            </button>
        </div>
    </div>
</div>
@endif
