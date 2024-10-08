<?php

namespace App\Controllers;
use App\Models\AmortissementsModel;
use App\Models\ChargesModel;
use CodeIgniter\Controller;

class AmortissementsController extends BaseController {
	public function index() {
		$amortissementsModel = new AmortissementsModel();
		$data['amortissements'] = $amortissementsModel->getAllAmortissementsPaginate();
		$data['pager'] = $amortissementsModel->pager;
		return view('amortissements_view', $data);
	}

	public function create() {
		$chargesModel = new ChargesModel();
		$data['charges'] = $chargesModel->getAllCharges();
		return view('add_amortissement',$data);
	}

	public function insertAmortissement() {
		$amortissementsModel = new AmortissementsModel();
		$amortissementsModel->setDuree_amortissement($this->request->getVar('duree_amortissement'));
		$amortissementsModel->setMontant_annuel($this->request->getVar('montant_annuel'));
		$amortissementsModel->setDate_debut($this->request->getVar('date_debut'));
		$amortissementsModel->setId_charge($this->request->getVar('id_charge'));
		$amortissementsModel->createAmortissement();
		return $this->response->redirect(site_url('/amortissements-list'));
	}
	public function singleAmortissement($id = null) {
		$amortissementsModel = new AmortissementsModel();
		$data['amortissement_obj'] = $amortissementsModel->getAmortissementById($id);
		$chargesModel = new ChargesModel();
		$data['charges'] = $chargesModel->getAllCharges();
		return view('edit_amortissement', $data);
	}
	public function updateAmortissement() {
		$amortissementsModel = new AmortissementsModel();
		$amortissementsModel->setId_amortissement_($this->request->getVar('id_amortissement_'));
		$amortissementsModel->setDuree_amortissement($this->request->getVar('duree_amortissement'));
		$amortissementsModel->setMontant_annuel($this->request->getVar('montant_annuel'));
		$amortissementsModel->setDate_debut($this->request->getVar('date_debut'));
		$amortissementsModel->setId_charge($this->request->getVar('id_charge'));
		$amortissementsModel->updateAmortissement();
		return $this->response->redirect(site_url('/amortissements-list'));
	}
	public function deleteAmortissement($id = null) {
		$amortissementModel = new AmortissementsModel();
		$amortissementModel->setId_amortissement_($id);
		$data['amortissement'] = $amortissementModel->deleteAmortissement();
		return $this->response->redirect(site_url('/amortissements-list'));
	}
}
