<div>
    <form >
        @csrf
        @method('POST')
        <div class="input-group">
            <label class="form-label" style="margin-right: 35px; margin-bottom:35px;">Référence : <span class="tx-danger">*</span></label>
            <input class="form-control" id="phone" name="phone" type="text" wire:model.debounce.300ms="search" placeholder="Rechercher">
            <span class="input-group-btn">
                <button class="btn ripple btn-primary" type="button" wire:click.prevent="getDemande">Rechercher</button>
            </span>
        </div>
    </form>

    <table class="dataTable my-datatable1 table table-hover mg-b-0 table table-striped" style="margin-top:35px">
        <thead style="size: A3">
        <tr>
            <th style="font-family: 'Palatino Linotype'; font-size:small">Référence</th>
            <th style="font-family: 'Palatino Linotype'; font-size:small">Montant (XAF)</th>
            <th style="font-family: 'Palatino Linotype'; font-size:small">Client</th>
            <th style="font-family: 'Palatino Linotype'; font-size:small">Bénéficiaire</th>
            <th class="text-center" style="font-family: 'Palatino Linotype'; font-size:small">Actions</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                @forelse($demande as $demand)
                <td>{{$demand->ref_operation}}</td>
                <td>{{ \App\Http\Controllers\DemandeController::prixMill($demand->montant_livraison) }}</td>
                <td>{{ $demand->nom_client }}</td>
                <td>{{ $demand->nom_beneficiaire }}</td>

                <td>
                    <a href="{{ route('demandes.show', $demand->id) }}" title="Détails">
                        <i class="fas fa-bars mr-3"></i>
                    </a>
                </td>
                <tr/>
            @empty
        <tr colspan="" class="">Aucune demande de livraison disponible</tr>
                @endforelse
        </tbody>
    </table>
    </div>
</div>
</div>
