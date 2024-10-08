<?php

namespace App\Controllers;
use App\Models\CentresModel;
use CodeIgniter\Controller;

class CentresController extends BaseController {
	public function index() {
		$centresModel = new CentresModel();
		$data['centres'] = $centresModel->getAllCentresPaginate();
		$data['pager'] = $centresModel->pager;
		return view('centres_view', $data);
	}

	public function create() {
		return view('add_centre');
	}

	public function insertCentre() {
		$centresModel = new CentresModel();
		$centresModel->setNom($this->request->getVar('nom'));
		$centresModel->createCentre();
		return $this->response->redirect(site_url('/centres-list'));
	}
	public function singleCentre($id = null) {
		$centresModel = new CentresModel();
		$data['centre_obj'] = $centresModel->getCentreById($id);
		return view('edit_centre', $data);
	}
	public function updateCentre() {
		$centresModel = new CentresModel();
		$centresModel->setId_centre($this->request->getVar('id_centre'));
		$centresModel->setNom($this->request->getVar('nom'));
		$centresModel->updateCentre();
		return $this->response->redirect(site_url('/centres-list'));
	}
	public function deleteCentre($id = null) {
		$centreModel = new CentresModel();
		$centreModel->setId_centre($id);
		$data['centre'] = $centreModel->deleteCentre();
		return $this->response->redirect(site_url('/centres-list'));
	}
}
