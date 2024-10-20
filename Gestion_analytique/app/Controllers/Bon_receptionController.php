<?php

namespace App\Controllers;
use App\Models\Bon_receptionModel;
use App\Models\Bon_livraisonModel;

use App\Models\ChargesModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;
use App\Libraries\DompdfHelper;
use App\Models\Bon_sortieModel;
use App\Models\Pro_format_chargeModel;
use App\Models\Pro_format_produitModel;
use App\Models\ProduitModel;
use App\Models\StockModel;

class Bon_receptionController extends BaseController {
	public function liste_vente() {
		$bon_receptionModel = new Bon_receptionModel();
		$data['bon_reception'] = $bon_receptionModel->getAllBon_receptionPaginate();
		$data['pager'] = $bon_receptionModel->pager;
		return view('vente/bon_reception_view', $data);
	}

	public function liste_vente_admin() {
		$bon_receptionModel = new Bon_receptionModel();
		$data['bon_reception'] = $bon_receptionModel->getAllBon_receptionPaginateIsNotValid();
		$data['errorStock'] = null;
		if ($this->request->getVar('errorStock')) {
			$data['errorStock'] = $this->request->getVar('errorStock');
		}
		

		$data['pager'] = $bon_receptionModel->pager;
		return view('vente/bon_reception_view_admin', $data);
	}

	public function valider_bon_reception() {
		$bon_receptionModel = new Bon_receptionModel();
		$id_br = $this->request->getVar('id_br');
	
		if (!$id_br) {
			return redirect()->back()->with('error', 'ID du bon de réception manquant.');
		}
	
		$bon_reception = $bon_receptionModel->getBon_receptionById($id_br);
	
		if (!$bon_reception) {
			return redirect()->back()->with('error', 'Bon de réception introuvable.');
		}
		$produit = new ProduitModel();
		$produits = $produit->getQuantiteProduitStock($this->request->getVar('id_produit'), $bon_reception['quantite']);
        $quantite_stock = $produits['quantite_dispo'];
            
		if ($quantite_stock>=$bon_reception['quantite']) {
			$bon_receptionModel->updateIsvalid($id_br, true);
			$date_commande = $bon_reception['date_commande'];
			$bon_livraison = new Bon_livraisonModel();
			$bon_livraison->setId_br($id_br);
			$bon_livraison->setDate_livraison($date_commande);
			$bon_livraison->createBon_livraison();
	
			$bon_sortie = new Bon_sortieModel();
			$bon_sortie->setid_produit($bon_reception['id_produit']);
			$bon_sortie->setQuantite($bon_reception['quantite']);
			$bon_sortie->setDate_sortie($date_commande);
			$bon_sortie->createBon_sortie();
	
			$stock = new StockModel();
			$stock->setId_produit($bon_reception['id_produit']);
			$stock->setDebit(0);
			$stock->setCredit($bon_reception['quantite']);
			$stock->setDate_stock($date_commande);
			$stock->createStock();
			return redirect()->to('vente_valider?id_br='.$id_br)->with('message', 'Le bon de réception a été validé avec succès.');

		}else{
			return redirect()->to('liste_vente_admin?errorStock=quantite insuffisant en stock')->with('message', 'Le bon de réception a été validé avec succès.');
		}

	}

	public function annuler_bon_reception(){
		$bon_receptionModel = new Bon_receptionModel();
		$id_br = $this->request->getVar('id_br');
		$bon_receptionModel->delete($id_br);
		return redirect('liste_vente_admin')->back()->with('message', 'Le bon de réception a été annulé avec succès.');
	}
	
	public function vente_valider(): string{
		$id_br = request()->getGet('id_br');
		return view('vente/vente_valider',['id_br' => $id_br]);
	}


	public function getdetails_bon_reception() {
		$bon_receptionModel = new Bon_receptionModel();
		$data['bon_reception_details'] = $bon_receptionModel->getdetails_bon_reception($this->request->getVar('id_br'));
		return view('vente/details_bon_reception', $data);
	}

	public function facture_pdf()
    {
        ini_set('max_execution_time', 60);

        $bon_receptionModel = new Bon_receptionModel();
        $id_br = $this->request->getVar('id_br');
        $data['bon_reception_details'] = $bon_receptionModel->getdetails_bon_reception($id_br);

        if (!$data['bon_reception_details']) {
            throw new \Exception('Devis non trouvé.');
        }

        $dompdfHelper = new DompdfHelper();

        $htmlContent = view('pdf/facture', $data);
        $fileName = WRITEPATH . 'pdfs/facture_' . $id_br . '.pdf';
        $dompdfHelper->generatePDF($htmlContent, $fileName);

        return $this->response->download($fileName, null)->setFileName('devis_' . $id_br . '.pdf');
    }
	
}
