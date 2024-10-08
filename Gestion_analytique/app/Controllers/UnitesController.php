<?php

namespace App\Controllers;
use App\Models\UnitesModel;
use CodeIgniter\Controller;

class UnitesController extends BaseController {
	public function index() {
		$unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnitesPaginate();
		$data['pager'] = $unitesModel->pager;
		return view('unites_view', $data);
	}

	public function create() {
		return view('add_unite');
	}

	public function insertUnite() {
		$unitesModel = new UnitesModel();
		$unitesModel->setUnite($this->request->getVar('unite'));
		$unitesModel->createUnite();
		return $this->response->redirect(site_url('/unites-list'));
	}
	public function singleUnite($id = null) {
		$unitesModel = new UnitesModel();
		$data['unite_obj'] = $unitesModel->getUniteById($id);
		return view('edit_unite', $data);
	}
	public function updateUnite() {
		$unitesModel = new UnitesModel();
		$unitesModel->setId_unite($this->request->getVar('id_unite'));
		$unitesModel->setUnite($this->request->getVar('unite'));
		$unitesModel->updateUnite();
		return $this->response->redirect(site_url('/unites-list'));
	}
	public function deleteUnite($id = null) {
		$uniteModel = new UnitesModel();
		$uniteModel->setId_unite($id);
		$data['unite'] = $uniteModel->deleteUnite();
		return $this->response->redirect(site_url('/unites-list'));
	}
}
