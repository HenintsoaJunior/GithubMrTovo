<?php

namespace App\Controllers;
use App\Models\Pro_format_produitModel;
use App\Models\ProduitModel;
use App\Models\FournisseurModel;
use App\Models\StockModel;
use CodeIgniter\Controller;

class Pro_format_produitController extends BaseController {
	public function index() {
		$pro_format_produitModel = new Pro_format_produitModel();
		$data['pro_format_produit'] = $pro_format_produitModel->getAllPro_format_produitPaginateIsNotValid();
		$data['pager'] = $pro_format_produitModel->pager;
		return view('achat/pro_format_produit_view', $data);
	}

	public function pro_format_produit_user() {
		$pro_format_produitModel = new Pro_format_produitModel();
		$data['pro_format_produit'] = $pro_format_produitModel->getProformatProduit();
		return view('achat/pro_format_produit_user', $data);
	}

	public function valider_proformat_produit() {
		$pro_format_produitModel = new Pro_format_produitModel();
		$id_pfp = $this->request->getVar('id_pfp');
	
		if (!$id_pfp) {
			return redirect()->back()->with('error', 'ID du bon de réception manquant.');
		}
	
		$pro_format_produit = $pro_format_produitModel->getPro_format_produitById($id_pfp);
	
		if (!$pro_format_produit) {
			return redirect()->back()->with('error', 'pro_format_produit introuvable.');
		}
	
		$pro_format_produitModel->updateIsvalid($id_pfp, true);
		$stock = new StockModel();
		$stock->setId_produit($pro_format_produit['id_produit']);
		$stock->setDebit($pro_format_produit['quantite']);
		$stock->setCredit(0);
		$stock->setDate_stock($pro_format_produit['date_livraison']);
		$stock->createStock();
	
		return redirect()->to('achat_valider_pfp?id_pfp='.$id_pfp)->with('message', 'Le bon de réception a été validé avec succès.');
	
	}


	public function achat_valider_pfp(): string{
		$id_pfp = request()->getGet('id_pfp');
		return view('achat/achat_valider_pfp',['id_pfp' => $id_pfp]);
	}

	public function annuler_proformat_produit(){
		$pro_format_produitModel = new Pro_format_produitModel();
		$id_pfp = $this->request->getVar('id_pfp');
		$pro_format_produitModel->delete($id_pfp);
		return redirect('pro_format_produit-list')->back()->with('message', 'Le bon de réception a été annulé avec succès.');
	}
}
