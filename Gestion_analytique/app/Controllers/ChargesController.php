<?php

namespace App\Controllers;
use App\Models\ChargesModel;
use App\Models\GroupesModel;
use App\Models\Nature_chargesModel;
use App\Models\UnitesModel;
use App\Models\ExercicesModel;
use App\Models\Type_chargesModel;
use CodeIgniter\Controller;

class ChargesController extends BaseController {
	public function index() {
		$chargesModel = new ChargesModel();
		$data['charges'] = $chargesModel->getAllChargesPaginate();
		$data['pager'] = $chargesModel->pager;
		return view('charges_view', $data);
	}

	public function create() {
		$groupesModel = new GroupesModel();
		$data['groupes'] = $groupesModel->getAllGroupes();
		$nature_chargesModel = new Nature_chargesModel();
		$data['nature_charges'] = $nature_chargesModel->getAllNature_charges();
		$unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnites();
		$exercicesModel = new ExercicesModel();
		$data['exercices'] = $exercicesModel->getAllExercices();
		$type_chargesModel = new Type_chargesModel();
		$data['type_charges'] = $type_chargesModel->getAllType_charges();
		return view('add_charge',$data);
	}

	public function insertCharge() {
		$chargesModel = new ChargesModel();
		$chargesModel->setCharge($this->request->getVar('charge'));
		$chargesModel->setMontant_total($this->request->getVar('montant_total'));
		$chargesModel->setId_exercice($this->request->getVar('id_exercice'));
		$chargesModel->setId_groupe($this->request->getVar('id_groupe'));
		$chargesModel->setId_unite($this->request->getVar('id_unite'));
		$chargesModel->setId_type_charge($this->request->getVar('id_type_charge'));
		$chargesModel->setId_nature_charge($this->request->getVar('id_nature_charge'));
		$chargesModel->createCharge();
		return $this->response->redirect(site_url('/charges-list'));
	}
	public function singleCharge($id = null) {
		$chargesModel = new ChargesModel();
		$data['charge_obj'] = $chargesModel->getChargeById($id);
		$groupesModel = new GroupesModel();
		$data['groupes'] = $groupesModel->getAllGroupes();
		$nature_chargesModel = new Nature_chargesModel();
		$data['nature_charges'] = $nature_chargesModel->getAllNature_charges();
		$unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnites();
		$exercicesModel = new ExercicesModel();
		$data['exercices'] = $exercicesModel->getAllExercices();
		$type_chargesModel = new Type_chargesModel();
		$data['type_charges'] = $type_chargesModel->getAllType_charges();
		return view('edit_charge', $data);
	}
	public function updateCharge() {
		$chargesModel = new ChargesModel();
		$chargesModel->setId_charge($this->request->getVar('id_charge'));
		$chargesModel->setCharge($this->request->getVar('charge'));
		$chargesModel->setMontant_total($this->request->getVar('montant_total'));
		$chargesModel->setId_exercice($this->request->getVar('id_exercice'));
		$chargesModel->setId_groupe($this->request->getVar('id_groupe'));
		$chargesModel->setId_unite($this->request->getVar('id_unite'));
		$chargesModel->setId_type_charge($this->request->getVar('id_type_charge'));
		$chargesModel->setId_nature_charge($this->request->getVar('id_nature_charge'));
		$chargesModel->updateCharge();
		return $this->response->redirect(site_url('/charges-list'));
	}
	public function deleteCharge($id = null) {
		$chargeModel = new ChargesModel();
		$chargeModel->setId_charge($id);
		$data['charge'] = $chargeModel->deleteCharge();
		return $this->response->redirect(site_url('/charges-list'));
	}
}
