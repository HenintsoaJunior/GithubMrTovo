<?php

namespace App\Controllers;
use App\Models\StockModel;
use App\Models\ProduitModel;
use CodeIgniter\Controller;

class StockController extends BaseController {
	public function index() {
		$stockModel = new StockModel();
		$data['stock'] = $stockModel->getAllStock();
		$data['pager'] = $stockModel->pager;
		return view('stock/stock_view', $data);
	}

	public function create() {
		$produitModel = new ProduitModel();
		$data['produit'] = $produitModel->getAllProduit();
		return view('stock/add_stock',$data);
	}

	public function insertStock() {
		$stockModel = new StockModel();
		$stockModel->setId_produit($this->request->getVar('id_produit'));
		$stockModel->setDebit($this->request->getVar('debit'));
		$stockModel->setCredit($this->request->getVar('credit'));
		$stockModel->setDate_stock($this->request->getVar('date_stock'));
		$stockModel->createStock();
		return $this->response->redirect(site_url('/stock-list'));
	}
	public function singleStock($id = null) {
		$stockModel = new StockModel();
		$data['stock_obj'] = $stockModel->getStockById($id);
		$produitModel = new ProduitModel();
		$data['produit'] = $produitModel->getAllProduit();
		return view('stock/edit_stock', $data);
	}
	public function updateStock() {
		$stockModel = new StockModel();
		$stockModel->setId_stock($this->request->getVar('id_stock'));
		$stockModel->setId_produit($this->request->getVar('id_produit'));
		$stockModel->setDebit($this->request->getVar('debit'));
		$stockModel->setCredit($this->request->getVar('credit'));
		$stockModel->setDate_stock($this->request->getVar('date_stock'));
		$stockModel->updateStock();
		return $this->response->redirect(site_url('/stock-list'));
	}
	public function deleteStock($id = null) {
		$stockModel = new StockModel();
		$stockModel->setId_stock($id);
		$data['stock'] = $stockModel->deleteStock();
		return $this->response->redirect(site_url('/stock-list'));
	}
}
