<?php

namespace App\Controllers;
use App\Models\Type_chargesModel;
use CodeIgniter\Controller;

class Type_chargesController extends BaseController {
	public function index() {
		$type_chargesModel = new Type_chargesModel();
		$data['type_charges'] = $type_chargesModel->getAllType_chargesPaginate();
		$data['pager'] = $type_chargesModel->pager;
		return view('type_charges_view', $data);
	}

	public function create() {
		return view('add_type_charge');
	}

	public function insertType_charge() {
		$type_chargesModel = new Type_chargesModel();
		$type_chargesModel->setCharge($this->request->getVar('charge'));
		$type_chargesModel->createType_charge();
		return $this->response->redirect(site_url('/type_charges-list'));
	}
	public function singleType_charge($id = null) {
		$type_chargesModel = new Type_chargesModel();
		$data['type_charge_obj'] = $type_chargesModel->getType_chargeById($id);
		return view('edit_type_charge', $data);
	}
	public function updateType_charge() {
		$type_chargesModel = new Type_chargesModel();
		$type_chargesModel->setId_type_charge($this->request->getVar('id_type_charge'));
		$type_chargesModel->setCharge($this->request->getVar('charge'));
		$type_chargesModel->updateType_charge();
		return $this->response->redirect(site_url('/type_charges-list'));
	}
	public function deleteType_charge($id = null) {
		$type_chargeModel = new Type_chargesModel();
		$type_chargeModel->setId_type_charge($id);
		$data['type_charge'] = $type_chargeModel->deleteType_charge();
		return $this->response->redirect(site_url('/type_charges-list'));
	}
}
