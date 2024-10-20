<?php

namespace App\Models;
use CodeIgniter\Model;

class Pro_format_produitModel extends Model {
	protected $table = 'pro_format_produit';
	protected $primaryKey = 'id_pf';
	protected $allowedFields = ['id_fournisseur', 'id_produit', 'quantite', 'date_livraison', 'date_commande', 'isvalid'];
	private $id_pf;
	private $id_fournisseur;
	private $id_produit;
	private $quantite;
	private $date_livraison;
	private $date_commande;
	private $isvalid;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_pf = $data['id_pf'] ?? null;
			$this->id_fournisseur = $data['id_fournisseur'] ?? null;
			$this->id_produit = $data['id_produit'] ?? null;
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

	public function getId_produit() {
		return $this->id_produit;
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

	public function setId_produit($id_produit) {
		$this->id_produit = $id_produit;
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

	public function getAllPro_format_produit() {
		return $this->orderBy('id_pf', 'DESC')->findAll();
	}

	public function getAllPro_format_produitPaginate() {
		return $this->orderBy('id_pf', 'DESC')->paginate(5);
	}

	public function getAllPro_format_produitPaginateIsNotValid() {
		return $this->where('isvalid', false)
					->orderBy('id_pf', 'DESC')
					->paginate(5);
	}

	public function updateIsvalid($id_pfp, $isvalid) {
		return $this->update($id_pfp, ['isvalid' => $isvalid]);
	}

	public function getPro_format_produitById($id) {
		return $this->where('id_pf', $id)->first();
	}

	public function createPro_format_produit() {
		$data = [
			'id_fournisseur' => $this->id_fournisseur,
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_livraison' => $this->date_livraison,
			'date_commande' => $this->date_commande,
			'isvalid' => $this->isvalid,
		];
		return $this->insert($data);
	}

	public function updatePro_format_produit() {
		$data = [
			'id_fournisseur' => $this->id_fournisseur,
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_livraison' => $this->date_livraison,
			'date_commande' => $this->date_commande,
			'isvalid' => $this->isvalid,
		];
		return $this->update($this->id_pf,$data);
	}

	public function deletePro_format_produit() {
		return $this->where('id_pf', $this->id_pf)->delete($this->id_pf);
	}

	public function getComptaSousEcriture() {
		$builder = $this->db->table('v_compta_sous_ecriture');
		$query = $builder->get();
	
		if ($query->getNumRows() > 0) {
			return $query->getResultArray();
		} else {
			return [];
		}
	}

	public function getProformatProduit() {
		$builder = $this->db->table('v_proformat_produit_details');
		$query = $builder->get();
	
		if ($query->getNumRows() > 0) {
			return $query->getResultArray();
		} else {
			return [];
		}
	}

}
