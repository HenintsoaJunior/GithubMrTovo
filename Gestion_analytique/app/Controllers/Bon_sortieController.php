<?php

namespace App\Controllers;

use App\Libraries\DompdfHelper;
use App\Models\Bon_sortieModel;
use App\Models\ChargesModel;
use CodeIgniter\Controller;

class Bon_sortieController extends BaseController {
	public function index() {
		$bon_sortieModel = new Bon_sortieModel();
		$data['bon_sortie'] = $bon_sortieModel->getAllBon_sortiePaginate();
		$data['pager'] = $bon_sortieModel->pager;
		return view('vente/bon_sortie_view', $data);
	}

	public function getBon_sortieDetails() {
		$bon_sortieModel = new Bon_sortieModel();
		$id_bs = $this->request->getVar('id_bs');
		$data['bon_sortie_details'] = $bon_sortieModel->getBon_sortieDetails($id_bs);
		return view('vente/details_bon_sortie', $data);
	}

	public function facture_bon_sortie_pdf()
    {
        ini_set('max_execution_time', 60);

        $bon_sortieModel = new Bon_sortieModel();
        $id_bl = $this->request->getVar('id_bl');
        $data['bon_sortie_details'] = $bon_sortieModel->getBon_sortieDetails($id_bl);

        if (!$data['bon_sortie_details']) {
            throw new \Exception('Devis non trouvé.');
        }

        $dompdfHelper = new DompdfHelper();

        $htmlContent = view('pdf/facture_bon_sortie', $data);
        $fileName = WRITEPATH . 'pdfs/facture_bon_sortie' . $id_bl . '.pdf';
        $dompdfHelper->generatePDF($htmlContent, $fileName);

        return $this->response->download($fileName, null)->setFileName('facture_bon_sortie' . $id_bl . '.pdf');
    }

}
