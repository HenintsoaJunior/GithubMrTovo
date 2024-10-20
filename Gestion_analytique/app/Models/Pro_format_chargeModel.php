<?php

namespace App\Models;
use CodeIgniter\Model;

class Pro_format_chargeModel extends Model {
	protected $table = 'pro_format_charge';
	protected $primaryKey = 'id_pf';
	protected $allowedFields = ['id_fournisseur', 'id_charge', 'quantite', 'date_livraison', 'date_commande', 'isvalid'];
	private $id_pf;
	private $id_fournisseur;
	private $id_charge;
	private $quantite;
	private $date_livraison;
	private $date_commande;
	private $isvalid;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_pf = $data['id_pf'] ?? null;
			$this->id_fournisseur = $data['id_fournisseur'] ?? null;
			$this->id_charge = $data['id_charge'] ?? null;
			$this->quantite = $data['quantite'] ?? null;
			$this->date_livraison = $data['date_livraison'] ?? null;
			$this->date_commande = $data['date_commande'] ?? null;
			$this->isvalid = $data['isvalid'] ?? null;
		}
	}

	public function getId_pf() {
		return $this->id_pf;
	}

	public function getId_fournisseur() {
		return $this->id_fournisseur;
	}

	public function getId_charge() {
		return $this->id_charge;
	}

	public function getQuantite() {
		return $this->quantite;
	}

	public function getDate_livraison() {
		return $this->date_livraison;
	}

	public function getDate_commande() {
		return $this->date_commande;
	}

	public function getIsvalid() {
		return $this->isvalid;
	}

	public function setId_pf($id_pf) {
		$this->id_pf = $id_pf;
	}

	public function setId_fournisseur($id_fournisseur) {
		$this->id_fournisseur = $id_fournisseur;
	}

	public function setId_charge($id_charge) {
		$this->id_charge = $id_charge;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}

	public function setDate_livraison($date_livraison) {
		$this->date_livraison = $date_livraison;
	}

	public function setDate_commande($date_commande) {
		$this->date_commande = $date_commande;
	}

	public function setIsvalid($isvalid) {
		$this->isvalid = $isvalid;
	}

	public function getAllPro_format_charge() {
		return $this->orderBy('id_pf', 'DESC')->findAll();
	}

	public function getAllPro_format_chargePaginate() {
		return $this->orderBy('id_pf', 'DESC')->paginate(5);
	}

	public function getAllPro_format_chargePaginateIsNotValid() {
		return $this->where('isvalid', false)
					->orderBy('id_pf', 'DESC')
					->paginate(5);
	}

	public function getPro_format_chargeById($id) {
		return $this->where('id_pf', $id)->first();
	}

	public function updateIsvalid($id_pfc, $isvalid) {
		return $this->update($id_pfc, ['isvalid' => $isvalid]);
	}

	public function createPro_format_charge() {
		$data = [
			'id_fournisseur' => $this->id_fournisseur,
			'id_charge' => $this->id_charge,
			'quantite' => $this->quantite,
			'date_livraison' => $this->date_livraison,
			'date_commande' => $this->date_commande,
			'isvalid' => $this->isvalid,
		];
		return $this->insert($data);
	}

	public function updatePro_format_charge() {
		$data = [
			'id_fournisseur' => $this->id_fournisseur,
			'id_charge' => $this->id_charge,
			'quantite' => $this->quantite,
			'date_livraison' => $this->date_livraison,
			'date_commande' => $this->date_commande,
			'isvalid' => $this->isvalid,
		];
		return $this->update($this->id_pf,$data);
	}

	public function deletePro_format_charge() {
		return $this->where('id_pf', $this->id_pf)->delete($this->id_pf);
	}
	
	public function getProformatCharge() {
		$builder = $this->db->table('v_proformat_charge_details');
		$query = $builder->get();
	
		if ($query->getNumRows() > 0) {
			return $query->getResultArray();
		} else {
			return [];
		}
	}
}
