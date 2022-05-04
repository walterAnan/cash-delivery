<div>
    <div class="col-lg-6 form-group pr-0">
        <label class="form-label">Control: <span class="tx-danger">*</span></label>
        <select class="form-control" name="control_livraison_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="===== Sélectionner une option =====" required>
            <option value="0" label="===== Sélectionner le type du livreur =====">
            </option>
            @foreach($controls as $control)
                <option value="{{ $control->id }}">{{ $control->libelle }}</option>
            @endforeach
        </select>
    </div>
</div>
