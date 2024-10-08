<?php

namespace App\Models;

use CodeIgniter\Model;

class AnalytiqueModel extends Model
{
    protected $global = 'v_global';
    protected $global_centre = 'v_global_centre';
    protected $total_montant_analytique = 'v_total_montant_analytique';
    protected $total_rubrique = 'v_total_rubrique';
    protected $repartition = 'v_repartition';
    protected $total_general_repartition = 'v_total_general_repartition';
    protected $seuil_rentabilite = 'v_seuil_rentabilite';



    
    public function get_global($page = 1, $perPage = 10, $rubrique = null, $annee = null, $date_debut = null, $date_fin = null, $unite = null, $nature = null, $type_charge = null)
    {
        $offset = ($page - 1) * $perPage;

        // Commencer la requête
        $builder = $this->db->table($this->global);

        // Appliquer les critères de recherche si présents
        if ($rubrique) {
            $builder->like('rubriques', $rubrique);
        }
        if ($annee) {
            $builder->where('annee', $annee);
        }
        if ($date_debut) {
            $builder->where('date_debut >=', $date_debut);
        }
        if ($date_fin) {
            $builder->where('date_fin <=', $date_fin);
        }
        if ($unite) {
            $builder->like('unite', $unite);
        }
        if ($nature) {
            $builder->like('nature', $nature);
        }
        if ($type_charge) {
            $builder->like('type_charges', $type_charge);
        }

        // Récupérer les résultats avec pagination
        $results = $builder->limit($perPage, $offset)->get()->getResultArray();
        
        // Compter le total
        $total = $builder->countAllResults(false);  // 'false' pour ne pas réinitialiser la requête

        // Créer la pagination
        $pager = \Config\Services::pager();
        $pager->makeLinks($page, $perPage, $total, 'default_full');  // 'default_full' est un template de pagination

        return [
            'results' => $results,
            'pager' => $pager
        ];
    }

    public function get_total_montant_analytique()
    {
        return $this->db->table($this->total_montant_analytique)->get()->getResultArray();
    }

    public function get_repartition()
    {
        return $this->db->table($this->repartition)->get()->getResultArray();
    }

    public function get_total_rubrique()
    {
        return $this->db->table($this->total_rubrique)->get()->getFirstRow("array");
    }

    public function get_total_general_repartition()
    {
        return $this->db->table($this->total_general_repartition)->get()->getFirstRow("array");
    }

    public function get_seuil_rentabilite()
    {
        return $this->db->table($this->seuil_rentabilite)->get()->getResultArray();
    }

    public function getCentreRubriqueByNom($id)
    {
        return $this->db->table($this->global_centre)
                        ->where('id_charge', $id)
                        ->get()
                        ->getResultArray();
    }

    public function getCoutElevage($nombre = 1)
    {
        $query = $this->db->query("SELECT * FROM cout_elevage(?)", [$nombre]);
        return $query->getResultArray();
    }

    public function getCout_production_general($nombre = 1)
    {
        $query = $this->db->query("SELECT * FROM cout_production_general(?)", [$nombre]);
        return $query->getResultArray();
    }


    
}