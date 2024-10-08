<?php

namespace App\Controllers;

use App\Models\AnalytiqueModel;
use App\Models\CentresModel;
use App\Models\ChargesModel;
use App\Models\ExercicesModel;
use App\Models\GroupesModel;
use App\Models\Liaison_charge_centreModel;
use App\Models\Mouvement_charge_centreModel;
use App\Models\Nature_chargesModel;
use App\Models\RubriquesModel;
use App\Models\Type_chargesModel;
use App\Models\UnitesModel;
use CodeIgniter\Controller;
use Exception;

class AnalytiqueController extends BaseController {
    public function global()
    {
        $analytiqueModel = new AnalytiqueModel();

        // Récupérer la page courante, ou 1 par défaut
        $page = $this->request->getVar('page') ? $this->request->getVar('page') : 1;

        // Récupérer les paramètres de recherche depuis la requête
        $rubrique = $this->request->getVar('rubrique');
        $annee = $this->request->getVar('annee');
        $date_debut = $this->request->getVar('date_debut');
        $date_fin = $this->request->getVar('date_fin');
        $unite = $this->request->getVar('unite');
        $nature = $this->request->getVar('nature');
        $type_charge = $this->request->getVar('type_charge');

        // Appeler la méthode avec les paramètres de recherche
        $data = $analytiqueModel->get_global(
            $page,
            10, // ou un autre nombre pour perPage
            $rubrique,
            $annee,
            $date_debut,
            $date_fin,
            $unite,
            $nature,
            $type_charge
        );

        // Charger la vue avec les données
        return view('tableau_global', $data);
    }



    public function global_centre_rubrique($id = null) {
		$analytiqueModel = new AnalytiqueModel();
		$data['global_centre_rubrique'] = $analytiqueModel->getCentreRubriqueByNom($id);
		return view('tableau_global_centre', $data);
	}

    public function formulaire_analytique() {
        $type_charge = new Type_chargesModel();
        $data['type_charges'] = $type_charge->getAllType_charges();
        $nature_charge = new Nature_chargesModel();
        $data['nature_charges'] = $nature_charge->getAllNature_charges();
		$groupesModel = new GroupesModel();
		$data['groupes'] = $groupesModel->getAllGroupes();
        $unitesModel = new UnitesModel();
		$data['unites'] = $unitesModel->getAllUnites();
        $centresModel = new CentresModel();
		$data['centres'] = $centresModel->getAllCentres();
		return view('formulaire_analytique', $data);
	}
    
    public function insert_analytique_form() {
        $db = \Config\Database::connect();

        $db->transStart();

        try {
            $exercice = new ExercicesModel();
            $date_debut = $this->request->getVar('date_debut');
            $date_fin = $this->request->getVar('date_fin');

            // Créez un nouvel exercice
            $exercice->setDate_debut($date_debut);
            $exercice->setDate_fin($date_fin);
            $exercice->createExercice();
            $id_exercice = $exercice->insertID();

            $chargeModel = new ChargesModel();
            $charge = $this->request->getVar('charge');
            $montants = $this->request->getVar('montants');

            $id_groupe = $this->request->getVar('id_groupe');
            $id_unite = $this->request->getVar('id_unite');
            $id_type_charge = $this->request->getVar('id_type_charge');
            $id_nature_charge = $this->request->getVar('id_nature_charge');

            // Vérifiez si tous les champs requis sont remplis
            if ($charge && $id_groupe && $id_unite && $id_type_charge && $id_nature_charge && $montants) {
                // Définissez les propriétés avant d'appeler createCharge
                $chargeModel->setCharge($charge);
                $chargeModel->setMontant_total($montants);
                $chargeModel->setId_exercice($id_exercice);
                $chargeModel->setId_groupe($id_groupe);
                $chargeModel->setId_unite($id_unite);
                $chargeModel->setId_type_charge($id_type_charge);
                $chargeModel->setId_nature_charge($id_nature_charge);

                // Créez la charge
                $chargeModel->createCharge($charge, $date_debut, $date_fin);

                $id_charge = $chargeModel->insertID();
                $centres = $this->request->getVar('centres');
                $pourcentages = $this->request->getVar('pourcentages');

                $mouvementModel = new Liaison_charge_centreModel();

                // Si le centre est nul, on traite le montant sans centre
                if (isset($pourcentages) && !empty($pourcentages)) {
                    foreach ($pourcentages as $id_centre => $pourcentage) {
                        if ($pourcentage) {
                            $mouvementModel->setId_charge($id_charge);
                            $mouvementModel->setPourcentage($pourcentage);
                            if ($id_centre) {
                                $mouvementModel->setId_centre($id_centre);
                            }
                            $mouvementModel->createLiaison_charge_centre();
                        }
                    }
                }
            } else {
                // Si des champs sont manquants, lancer une exception
                throw new Exception('Veuillez remplir tous les champs requis.');
            }

            // Valider la transaction
            $db->transComplete();

            // Vérifiez si la transaction a réussi
            if ($db->transStatus() === false) {
                throw new Exception('Une erreur s\'est produite lors de l\'insertion des données.');
            }

            return $this->response->redirect(site_url('/formulaire_analytique'));
        } catch (Exception $e) {
            // Annuler la transaction en cas d'erreur
            $db->transRollback();
            return redirect()->back()->withInput()->with('error', $e->getMessage());
        }
    }
    
    
    public function total_montant_analytique() {
		$analytiqueModel = new AnalytiqueModel();
		$data['total_montant_analytique'] = $analytiqueModel->get_total_montant_analytique();
        $data['total_rubrique'] = $analytiqueModel->get_total_rubrique();
        $data['repartition'] = $analytiqueModel->get_repartition();
        $data['total_general_repartition'] = $analytiqueModel->get_total_general_repartition();
        $data['seuil_rentabilite'] = $analytiqueModel->get_seuil_rentabilite();
    

		return view('total_montant_analytique', $data);
	}
    
    public function cout_elevage_form() {
        $analytiqueModel = new AnalytiqueModel();
        $nombre = $this->request->getVar('nombre');
        if ($nombre) {
            $data['cout_elevage'] = $analytiqueModel->getCoutElevage($nombre);
        }
        return view('cout_elevage', $data);
    }
    public function cout_elevage_list() {
        $analytiqueModel = new AnalytiqueModel();
        $data['cout_elevage'] = $analytiqueModel->getCoutElevage();
        return view('cout_elevage', $data);
    }


    public function cout_production_general_form() {
        $analytiqueModel = new AnalytiqueModel();
        $nombre = $this->request->getVar('nombre');
        if ($nombre) {
            $data['cout_production_general'] = $analytiqueModel->getCout_production_general($nombre);
        }
        return view('cout_production_general', $data);
    }
    public function cout_production_general_list() {
        $analytiqueModel = new AnalytiqueModel();
        $data['cout_production_general'] = $analytiqueModel->getCout_production_general();
        return view('cout_production_general', $data);
    }
    
}