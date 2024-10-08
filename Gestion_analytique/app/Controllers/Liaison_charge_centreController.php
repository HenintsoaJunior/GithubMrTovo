<?php

namespace App\Controllers;
use App\Models\Liaison_charge_centreModel;
use App\Models\ChargesModel;
use App\Models\CentresModel;
use CodeIgniter\Controller;

class Liaison_charge_centreController extends BaseController {
	public function index() {
		$liaison_charge_centreModel = new Liaison_charge_centreModel();
		$data['liaison_charge_centre'] = $liaison_charge_centreModel->getAllLiaison_charge_centrePaginate();
		$data['pager'] = $liaison_charge_centreModel->pager;
		return view('liaison_charge_centre_view', $data);
	}

	public function create() {
		$chargesModel = new ChargesModel();
		$data['charges'] = $chargesModel->getAllCharges();
		$centresModel = new CentresModel();
		$data['centres'] = $centresModel->getAllCentres();
		return view('add_liaison_charge_centre',$data);
	}

	public function insertLiaison_charge_centre() {
		$liaison_charge_centreModel = new Liaison_charge_centreModel();
		$liaison_charge_centreModel->setId_centre($this->request->getVar('id_centre'));
		$liaison_charge_centreModel->setId_charge($this->request->getVar('id_charge'));
		$liaison_charge_centreModel->setMontant($this->request->getVar('montant'));
		$liaison_charge_centreModel->setDate_charge($this->request->getVar('date_charge'));
		$liaison_charge_centreModel->createLiaison_charge_centre();
		return $this->response->redirect(site_url('/liaison_charge_centre-list'));
	}
	public function singleLiaison_charge_centre($id = null) {
		$liaison_charge_centreModel = new Liaison_charge_centreModel();
		$data['liaison_charge_centre_obj'] = $liaison_charge_centreModel->getLiaison_charge_centreById($id);
		$chargesModel = new ChargesModel();
		$data['charges'] = $chargesModel->getAllCharges();
		$centresModel = new CentresModel();
		$data['centres'] = $centresModel->getAllCentres();
		return view('edit_liaison_charge_centre', $data);
	}
	public function updateLiaison_charge_centre() {
		$liaison_charge_centreModel = new Liaison_charge_centreModel();
		$liaison_charge_centreModel->setId_liaison($this->request->getVar('id_liaison'));
		$liaison_charge_centreModel->setId_centre($this->request->getVar('id_centre'));
		$liaison_charge_centreModel->setId_charge($this->request->getVar('id_charge'));
		$liaison_charge_centreModel->setMontant($this->request->getVar('montant'));
		$liaison_charge_centreModel->setDate_charge($this->request->getVar('date_charge'));
		$liaison_charge_centreModel->updateLiaison_charge_centre();
		return $this->response->redirect(site_url('/liaison_charge_centre-list'));
	}
	public function deleteLiaison_charge_centre($id = null) {
		$liaison_charge_centreModel = new Liaison_charge_centreModel();
		$liaison_charge_centreModel->setId_liaison($id);
		$data['liaison_charge_centre'] = $liaison_charge_centreModel->deleteLiaison_charge_centre();
		return $this->response->redirect(site_url('/liaison_charge_centre-list'));
	}
}
