<?php

namespace App\Controllers;
use App\Models\Nature_chargesModel;
use CodeIgniter\Controller;

class Nature_chargesController extends BaseController {
	public function index() {
		$nature_chargesModel = new Nature_chargesModel();
		$data['nature_charges'] = $nature_chargesModel->getAllNature_chargesPaginate();
		$data['pager'] = $nature_chargesModel->pager;
		return view('nature_charges_view', $data);
	}

	public function create() {
		return view('add_nature_charge');
	}

	public function insertNature_charge() {
		$nature_chargesModel = new Nature_chargesModel();
		$nature_chargesModel->setNature($this->request->getVar('nature'));
		$nature_chargesModel->createNature_charge();
		return $this->response->redirect(site_url('/nature_charges-list'));
	}
	public function singleNature_charge($id = null) {
		$nature_chargesModel = new Nature_chargesModel();
		$data['nature_charge_obj'] = $nature_chargesModel->getNature_chargeById($id);
		return view('edit_nature_charge', $data);
	}
	public function updateNature_charge() {
		$nature_chargesModel = new Nature_chargesModel();
		$nature_chargesModel->setId_nature_charge($this->request->getVar('id_nature_charge'));
		$nature_chargesModel->setNature($this->request->getVar('nature'));
		$nature_chargesModel->updateNature_charge();
		return $this->response->redirect(site_url('/nature_charges-list'));
	}
	public function deleteNature_charge($id = null) {
		$nature_chargeModel = new Nature_chargesModel();
		$nature_chargeModel->setId_nature_charge($id);
		$data['nature_charge'] = $nature_chargeModel->deleteNature_charge();
		return $this->response->redirect(site_url('/nature_charges-list'));
	}
}
