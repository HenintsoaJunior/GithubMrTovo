<?php

namespace App\Controllers;

use App\Libraries\DompdfHelper;
use App\Models\Bon_livraisonModel;
use CodeIgniter\Controller;

class Bon_livraisonController extends BaseController {
	public function index() {
		$bon_livraisonModel = new Bon_livraisonModel();
		$data['bon_livraison'] = $bon_livraisonModel->getAllBon_livraisonPaginate();
		$data['pager'] = $bon_livraisonModel->pager;
		return view('vente/bon_livraison_view', $data);
	}

	public function getBon_livraisonDetails() {
		$bon_sortieModel = new Bon_livraisonModel();
		$id_bl = $this->request->getVar('id_bl');
		$data['bon_livraison_details'] = $bon_sortieModel->getBon_livraisonDetails($id_bl);
		return view('vente/details_bon_livraison', $data);
	}

	public function facture_bon_livraison_pdf()
    {
        ini_set('max_execution_time', 60);

        $bon_livraisonModel = new Bon_livraisonModel();
        $id_bl = $this->request->getVar('id_bl');
        $data['bon_livraison_details'] = $bon_livraisonModel->getBon_livraisonDetails($id_bl);

        if (!$data['bon_livraison_details']) {
            throw new \Exception('Devis non trouvé.');
        }

        $dompdfHelper = new DompdfHelper();

        $htmlContent = view('pdf/facture_bon_livraison', $data);
        $fileName = WRITEPATH . 'pdfs/facture_bon_livraison' . $id_bl . '.pdf';
        $dompdfHelper->generatePDF($htmlContent, $fileName);

        return $this->response->download($fileName, null)->setFileName('facture_bon_livraison' . $id_bl . '.pdf');
    }
}
