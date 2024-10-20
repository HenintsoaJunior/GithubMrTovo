<?php

namespace App\Controllers;
use App\Models\Pro_format_chargeModel;
use App\Models\ChargesModel;
use App\Models\FournisseurModel;
use CodeIgniter\Controller;

class Pro_format_chargeController extends BaseController {
	public function index() {
		$pro_format_chargeModel = new Pro_format_chargeModel();
		$data['pro_format_charge'] = $pro_format_chargeModel->getAllPro_format_chargePaginateIsNotValid();
		$data['pager'] = $pro_format_chargeModel->pager;
		return view('achat/pro_format_charge_view', $data);
	}

	public function pro_format_charge_user() {
		$pro_format_chargeModel = new Pro_format_chargeModel();
		$data['pro_format_charge'] = $pro_format_chargeModel->getProformatCharge();
		return view('achat/pro_format_charge_user', $data);
	}

	public function valider_proformat_charge() {
		$pro_format_chargeModel = new Pro_format_chargeModel();
		$id_pfc = $this->request->getVar('id_pfc');
	
		if (!$id_pfc) {
			return redirect()->back()->with('error', 'ID du bon de réception manquant.');
		}
	
		$pro_format_charge = $pro_format_chargeModel->getPro_format_chargeById($id_pfc);
	
		if (!$pro_format_charge) {
			return redirect()->back()->with('error', 'pro_format_charge introuvable.');
		}
	
		$pro_format_chargeModel->updateIsvalid($id_pfc, true);
	
		return redirect()->to('achat_valider_pfc?id_pfc='.$id_pfc)->with('message', 'Le bon de réception a été validé avec succès.');
	
	}

	public function achat_valider_pfc(): string{
		$id_pfc = request()->getGet('id_pfc');
		return view('achat/achat_valider_pfc',['id_pfc' => $id_pfc]);
	}

	public function annuler_proformat_charge(){
		$pro_format_chargeModel = new Pro_format_chargeModel();
		$id_pfc = $this->request->getVar('id_pfc');
		$pro_format_chargeModel->delete($id_pfc);
		return redirect('pro_format_charge-list')->back()->with('message', 'Le bon de réception a été annulé avec succès.');
	}
	
}
