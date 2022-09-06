<div class="">
    <form wire:submit.prevent="saveMotif">
    <div class="modal-dialog">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Annulation</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Voulez-vous annuler cette demmande?

{{--                <div class="form-group row">--}}
                    <div class="form-group">
                        <label class="form-label">Motif: <span class="tx-danger">*</span></label>
                        <select wire:model="libelle" class="form-control" name="motif_annulation_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2">
                            <option label="===== Sélectionner une option ====="></option>
                            @foreach($this->motifs as $motif)
                                <option value="{{ $motif->id }}">{{ $motif->libelle }}</option>
                            @endforeach
                        </select>
                        @error('libelle') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    @if($this->libelle == 1) <!--   AUTRE   -->
                        <div class="form-group">
                            <label>Préciser</label>
                            <input type="text" class="form-control" placeholder="Motif" wire:model="libelle_autre" />
                            @error('libelle_autre')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
{{--                </div>--}}
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <div class="justify-content-between">
                    <button type="submit" class="btn btn-danger" id="swal-warning" style="margin-left: 0px">
                        OUI
                    </button>
                </div>
                <button type="button" class="btn btn-primary" data-dismiss="modal">NON</button>
            </div>

        </div>
    </div>
</form>
</div>
