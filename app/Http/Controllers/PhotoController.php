<?php

namespace App\Http\Controllers;
use App\Models\DemandeLivraison;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function imprime(int $id){
       $demande = DemandeLivraison::whereId($id)->first();
        $customer = new Buyer([
            'name'          => "",
            'custom_fields' => [
                'Nom du client' => $demande->nom_client,
                'Téléphone' =>$demande->tel_client,
                'Référence' =>$demande->ref_operation,
               'Montant'=> $demande->montant_livraison.''.'XAF',
               'Frais'=> $demande->frais_livraison.''.'XAF',
               'Bénéficiaire'=> $demande->nom_beneficiaire,
               'Date de la demande'=> $demande->date_reception,
               'lien GPS'=> $demande->lien_gps,
               'Code Livraison'=> $demande->voucher,
               'Addresse'=> $demande->adresse_livraison,
               'Statut'=> $demande->statutDemande->libelle,
                'Utilisateur'=>Auth::user()->name,
                'Motif de l\'annulation' => ($demande->desc_motif_annulation != null)?$demande->desc_motif_annulation: 'Demande du client',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->discountByPercent(10)
            ->taxRate(15)
            ->shipping(1.99)
            ->addItem($item);

        return $invoice->stream();
    }
}
