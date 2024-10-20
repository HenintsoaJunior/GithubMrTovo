<?php

namespace App\Controllers;

use App\Models\Bon_receptionModel;
use App\Models\ChargesModel;
use App\Models\ClientModel;
use App\Models\ProduitModel;

class VenteController extends BaseController
{
    public function venteform(): string
    {
        $clientModel = new ClientModel();
		$data['client'] = $clientModel->getAllClient();
        $produits = new ProduitModel();
		$data['produit'] = $produits->getAllProduit();

        return view('vente/form_vente',$data);
    }

    public function vente_validate()
    {
        $id_client = $this->request->getVar('id_client');
        $date_commande_client = $this->request->getVar('date_commande_client');
        $date_reception_commande = $this->request->getVar('date_reception_commande');

        // Récupération des produits et quantités envoyées par le formulaire
        $id_produits = $this->request->getVar('id_produit'); // Tableau d'IDs de produits
        $quantites = $this->request->getVar('quantite'); // Tableau de quantités

        $messages = [];

        // Vérifiez si id_produits et quantites sont des tableaux
        if (is_array($id_produits) && is_array($quantites)) {
            if (!empty($id_produits) && !empty($quantites)) {
                foreach ($id_produits as $index => $id_produit) {
                    if (!empty($id_produit) && isset($quantites[$index]) && $quantites[$index] > 0) {
                        $data = [
                            'id_client' => $id_client,
                            'id_produit' => $id_produit,
                            'quantite' => $quantites[$index],
                            'date_commande' => $date_commande_client,
                            'date_reception' => $date_reception_commande,
                            'isvalid' => false
                        ];

                        $bon_reception = new Bon_receptionModel($data);
                        
                        if ($bon_reception->createBon_reception()) {
                            $messages[] = "Produit ID $id_produit ajouté avec succès.";
                        } else {
                            $messages[] = "Erreur lors de l'ajout du produit ID $id_produit.";
                        }
                    }
                }
            } else {
                $messages[] = "Aucun produit ou quantité sélectionné.";
            }
        } else {
            $messages[] = "Les données des produits ou des quantités ne sont pas valides.";
        }

        return $this->venteform($messages);
    }

}
