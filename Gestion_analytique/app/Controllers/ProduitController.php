<?php

namespace App\Controllers;
use App\Models\ProduitModel;
use App\Models\Type_produitModel;
use App\Models\UnitesModel;
use CodeIgniter\Controller;

class ProduitController extends BaseController {
	public function index() {
		$produitModel = new ProduitModel();
		$data['produit'] = $produitModel->getAllProduitPaginate();
		$data['pager'] = $produitModel->pager;
		return view('produit_view', $data);
	}

	public function get_produit_unite() {
		$produitModel = new ProduitModel();
		$id_produit = $this->request->getVar('id_produit');
		$produit_unite = $produitModel->get_produit_unite($id_produit);
		
		// Préparer la réponse JSON
		$response = [
			'status' => 'success',
			'produit_unite' => $produit_unite
		];
	
		return $this->response->setJSON($response);
	}

	public function create() {
		$type_produitModel = new Type_produitModel();
		$data['type_produit'] = $type_produitModel->getAllType_produit();
		$unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnites();
		return view('add_produit',$data);
	}

	public function insertProduit() {
		$produitModel = new ProduitModel();
		$produitModel->setProduit($this->request->getVar('produit'));
		$produitModel->setId_unite($this->request->getVar('id_unite'));
		$produitModel->setPrixvente($this->request->getVar('prixvente'));
		$produitModel->setId_type_produit($this->request->getVar('id_type_produit'));
		$produitModel->createProduit();
		return $this->response->redirect(site_url('/produit-list'));
	}
	public function singleProduit($id = null) {
		$produitModel = new ProduitModel();
		$data['produit_obj'] = $produitModel->getProduitById($id);
		$type_produitModel = new Type_produitModel();
		$data['type_produit'] = $type_produitModel->getAllType_produit();
		$unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnites();
		return view('edit_produit', $data);
	}
	public function updateProduit() {
		$produitModel = new ProduitModel();
		$produitModel->setId_produit($this->request->getVar('id_produit'));
		$produitModel->setProduit($this->request->getVar('produit'));
		$produitModel->setId_unite($this->request->getVar('id_unite'));
		$produitModel->setPrixvente($this->request->getVar('prixvente'));
		$produitModel->setId_type_produit($this->request->getVar('id_type_produit'));
		$produitModel->updateProduit();
		return $this->response->redirect(site_url('/produit-list'));
	}
	public function deleteProduit($id = null) {
		$produitModel = new ProduitModel();
		$produitModel->setId_produit($id);
		$data['produit'] = $produitModel->deleteProduit();
		return $this->response->redirect(site_url('/produit-list'));
	}
}
