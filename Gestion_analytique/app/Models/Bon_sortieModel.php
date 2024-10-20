<?php

namespace App\Models;
use CodeIgniter\Model;

class Bon_sortieModel extends Model {
	protected $table = 'bon_sortie';
	protected $primaryKey = 'id_bs';
	protected $allowedFields = ['id_produit', 'quantite', 'date_sortie'];
	private $id_bs;
	private $id_produit;
	private $quantite;
	private $date_sortie;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_bs = $data['id_bs'] ?? null;
			$this->id_produit = $data['id_produit'] ?? null;
			$this->quantite = $data['quantite'] ?? null;
			$this->date_sortie = $data['date_sortie'] ?? null;
		}
	}

	public function getId_bs() {
		return $this->id_bs;
	}

	public function getid_produit() {
		return $this->id_produit;
	}

	public function getQuantite() {
		return $this->quantite;
	}

	public function getDate_sortie() {
		return $this->date_sortie;
	}

	public function setId_bs($id_bs) {
		$this->id_bs = $id_bs;
	}

	public function setid_produit($id_produit) {
		$this->id_produit = $id_produit;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}

	public function setDate_sortie($date_sortie) {
		$this->date_sortie = $date_sortie;
	}

	public function getAllBon_sortie() {
		return $this->orderBy('id_bs', 'DESC')->findAll();
	}

	public function getAllBon_sortiePaginate() {
		return $this->orderBy('id_bs', 'DESC')->paginate(5);
	}

	public function getBon_sortieById($id) {
		return $this->where('id_bs', $id)->first();
	}

	public function createBon_sortie() {
		$data = [
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_sortie' => $this->date_sortie,
		];
		return $this->insert($data);
	}

	public function updateBon_sortie() {
		$data = [
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_sortie' => $this->date_sortie,
		];
		return $this->update($this->id_bs,$data);
	}

	public function deleteBon_sortie() {
		return $this->where('id_bs', $this->id_bs)->delete($this->id_bs);
	}

	public function getBon_sortieDetails($id_bs = null) {
		$builder = $this->db->table('v_bon_sortie');
		
		if ($id_bs !== null) {
			$builder->where('id_bon_sortie', $id_bs);
		}
		$query = $builder->get();
		
		return $query->getRowArray();
	}
}
