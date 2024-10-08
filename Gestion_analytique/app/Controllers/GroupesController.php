<?php

namespace App\Controllers;
use App\Models\GroupesModel;
use CodeIgniter\Controller;

class GroupesController extends BaseController {
	public function index() {
		$groupesModel = new GroupesModel();
		$data['groupes'] = $groupesModel->getAllGroupesPaginate();
		$data['pager'] = $groupesModel->pager;
		return view('groupes_view', $data);
	}

	public function create() {
		return view('add_groupe');
	}

	public function insertGroupe() {
		$groupesModel = new GroupesModel();
		$groupesModel->setNom_groupe($this->request->getVar('nom_groupe'));
		$groupesModel->createGroupe();
		return $this->response->redirect(site_url('/groupes-list'));
	}
	public function singleGroupe($id = null) {
		$groupesModel = new GroupesModel();
		$data['groupe_obj'] = $groupesModel->getGroupeById($id);
		return view('edit_groupe', $data);
	}
	public function updateGroupe() {
		$groupesModel = new GroupesModel();
		$groupesModel->setId_groupe($this->request->getVar('id_groupe'));
		$groupesModel->setNom_groupe($this->request->getVar('nom_groupe'));
		$groupesModel->updateGroupe();
		return $this->response->redirect(site_url('/groupes-list'));
	}
	public function deleteGroupe($id = null) {
		$groupeModel = new GroupesModel();
		$groupeModel->setId_groupe($id);
		$data['groupe'] = $groupeModel->deleteGroupe();
		return $this->response->redirect(site_url('/groupes-list'));
	}
}
