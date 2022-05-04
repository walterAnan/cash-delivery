<div class="col-lg-12 row">
    <div class="col-lg-6 form-group">
        <label class="form-label">Livreur: <span class="tx-danger">*</span></label>
        <select wire:model="selectedLivreur" class="form-control" name="livreur_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required>
            <option value="0" label="Choose one">
            </option>
            @foreach($livreurs as $livreur)
                <option value="{{ $livreur->id }}">{{ $livreur->raisonSociale }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-6 form-group">
        <label class="form-label">Localite: <span class="tx-danger">*</span></label>
        <select wire:model="selectedLocalite" class="form-control" name="localite_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2">
            <option value="0" label="===== Sélectionner une option ====="></option>
            @foreach($localites as $localite)
                <option value="{{ $localite->id }}">{{ $localite->ville }}</option>
            @endforeach
        </select>
    </div>

    <div class="col-lg-6 form-group">
        <label class="form-label">Agent: <span class="tx-danger">*</span></label>
        <select wire:model="selectedAgent" class="form-control" name="agent_id" data-parsley-class-handler="#slWrapper2" data-parsley-errors-container="#slErrorContainer2" data-placeholder="Choose one" required
                @if(is_null($selectedLivreur)) disabled @endif>
            <option label="Sélectionner un agent"></option>

            @forelse($agents as $agent)
                <option value="{{ $agent->id }}">{{ $agent->nomAgent . ' ' . $agent->prenomAgent }}</option>
            @empty
                <option value="0" class="text-muted">Aucun agent livreur correspondant</option>
            @endforelse
        </select>
    </div>
</div>










