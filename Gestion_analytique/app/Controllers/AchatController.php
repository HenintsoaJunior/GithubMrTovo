<?php

namespace App\Controllers;

use App\Models\Bon_sortieModel;
use App\Models\ChargesModel;
use App\Models\FournisseurModel;
use App\Models\Pro_format_chargeModel;
use App\Models\Pro_format_produitModel;
use App\Models\ProduitModel;
use App\Models\StockModel;

class AchatController extends BaseController
{
    public function achatform(): string
    {
        $fournisseur = new FournisseurModel();
        $produit = new ProduitModel();
        $charge = new ChargesModel();
        $data['fournisseur'] = $fournisseur->getAllFournisseur();
        $data['produit'] = $produit->getAllProduit();
        $data['charge'] = $charge->getAllCharges();


        return view('achat/form_achat',$data);
    }
    public function achat() {
        $cart = $this->request->getVar('cart');
        
        if (!is_array($cart) || empty($cart)) {
            return $this->response->redirect(site_url('achatform'));
        }
    
        foreach ($cart as $item) {
            $type = $item['type'];
            $idFournisseur = $item['fournisseur']['id'] ?? null;
            $quantite = $item['quantite'];
            $dateLivraison = $this->request->getVar('date_livraison');
            $dateCommande = $this->request->getVar('date_commande');
            $isValid = false;
    
            if ($type === 'produit') {
                $this->handleProduit($item['produit']['id'], null, $quantite, $dateLivraison, $dateCommande, $isValid);
            } elseif ($type === 'charge') {
                $this->handleCharge($item['charge']['id'], $idFournisseur, $quantite, $dateLivraison, $dateCommande, $isValid);
            }
        }
    
        return $this->response->redirect(site_url('achatform'));
    }
    
    private function handleProduit($idProduit, $idFournisseur, $quantite, $dateLivraison, $dateCommande, $isValid) {
        $proFormatProduitModel = new Pro_format_produitModel();
        $proFormatProduitModel->setId_fournisseur($idFournisseur);
        $proFormatProduitModel->setId_produit($idProduit);
        $proFormatProduitModel->setQuantite($quantite);
        $proFormatProduitModel->setDate_livraison($dateLivraison);
        $proFormatProduitModel->setDate_commande($dateCommande);
        $proFormatProduitModel->setIsvalid($isValid);
    
        $produit = new ProduitModel();
        $produits = $produit->getQuantiteProduitStock($idProduit, $quantite);
        $quantite_stock = $produits['quantite_dispo'];
    
        if ($produits !== null) {
            if ($quantite_stock - $proFormatProduitModel->getQuantite() >= 0) {
                $this->createBonSortie($proFormatProduitModel);
                $this->updateStock($proFormatProduitModel);
            } else {
                $quantite_demander = ($quantite_stock - $proFormatProduitModel->getQuantite()) * -1;
                $proFormatProduitModel->setQuantite($quantite_demander);
                $proFormatProduitModel->createPro_format_produit();
            }
        } else {
            // Log this error or handle it appropriately
            echo "Produit est vide";
        }
    }
    
    private function handleCharge($idCharge, $idFournisseur, $quantite, $dateLivraison, $dateCommande, $isValid) {
        $proFormatChargeModel = new Pro_format_chargeModel();
        $proFormatChargeModel->setId_fournisseur($idFournisseur);
        $proFormatChargeModel->setId_charge($idCharge);
        $proFormatChargeModel->setQuantite($quantite);
        $proFormatChargeModel->setDate_livraison($dateLivraison);
        $proFormatChargeModel->setDate_commande($dateCommande);
        $proFormatChargeModel->setIsvalid($isValid);
        $proFormatChargeModel->createPro_format_charge();
    }
    
    private function createBonSortie($proFormatProduitModel) {
        $bon_sortie = new Bon_sortieModel();
        $bon_sortie->setid_produit($proFormatProduitModel->getId_produit());
        $bon_sortie->setQuantite($proFormatProduitModel->getQuantite());
        $bon_sortie->setDate_sortie($proFormatProduitModel->getDate_livraison());
        $bon_sortie->createBon_sortie();
    }
    
    private function updateStock($proFormatProduitModel) {
        $stock = new StockModel();
        $stock->setId_produit($proFormatProduitModel->getId_produit());
        $stock->setDebit(0);
        $stock->setCredit($proFormatProduitModel->getQuantite());
        $stock->setDate_stock($proFormatProduitModel->getDate_livraison());
        $stock->createStock();
    }
}
