<?php

namespace App\Models;
use CodeIgniter\Model;

class Bon_receptionModel extends Model {
	protected $table = 'bon_reception';
	protected $primaryKey = 'id_br';
	protected $allowedFields = ['id_client', 'id_produit', 'quantite', 'date_commande', 'date_reception', 'isvalid'];
	private $id_br;
	private $id_client;
	private $id_produit;
	private $quantite;
	private $date_commande;
	private $date_reception;
	private $isvalid;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_br = $data['id_br'] ?? null;
			$this->id_client = $data['id_client'] ?? null;
			$this->id_produit = $data['id_produit'] ?? null;
			$this->quantite = $data['quantite'] ?? null;
			$this->date_commande = $data['date_commande'] ?? null;
			$this->date_reception = $data['date_reception'] ?? null;
			$this->isvalid = $data['isvalid'] ?? null;
		}
	}

	public function getId_br() {
		return $this->id_br;
	}

	public function getId_client() {
		return $this->id_client;
	}

	public function getid_produit() {
		return $this->id_produit;
	}

	public function getQuantite() {
		return $this->quantite;
	}

	public function getDate_commande() {
		return $this->date_commande;
	}

	public function getDate_reception() {
		return $this->date_reception;
	}

	public function getIsvalid() {
		return $this->isvalid;
	}

	public function setId_br($id_br) {
		$this->id_br = $id_br;
	}

	public function setId_client($id_client) {
		$this->id_client = $id_client;
	}

	public function setid_produit($id_produit) {
		$this->id_produit = $id_produit;
	}

	public function setQuantite($quantite) {
		$this->quantite = $quantite;
	}

	public function setDate_commande($date_commande) {
		$this->date_commande = $date_commande;
	}

	public function setDate_reception($date_reception) {
		$this->date_reception = $date_reception;
	}

	public function setIsvalid($isvalid) {
		$this->isvalid = $isvalid;
	}

	public function getAllBon_reception() {
		return $this->orderBy('id_br', 'DESC')->findAll();
	}

	public function getAllBon_receptionPaginate() {
		return $this->orderBy('id_br', 'DESC')->paginate(5);
	}

	public function getAllBon_receptionPaginateIsNotValid() {
		return $this->where('isvalid', false)
					->orderBy('id_br', 'DESC')
					->paginate(5);
	}

	public function getBon_receptionById($id) {
		return $this->where('id_br', $id)->first();
	}

	public function updateIsvalid($id_br, $isvalid) {
		return $this->update($id_br, ['isvalid' => $isvalid]);
	}
	

	public function createBon_reception() {
		$data = [
			'id_client' => $this->id_client,
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_commande' => $this->date_commande,
			'date_reception' => $this->date_reception,
			'isvalid' => $this->isvalid,
		];
		return $this->insert($data);
	}

	public function updateBon_reception() {
		$data = [
			'id_client' => $this->id_client,
			'id_produit' => $this->id_produit,
			'quantite' => $this->quantite,
			'date_commande' => $this->date_commande,
			'date_reception' => $this->date_reception,
			'isvalid' => $this->isvalid,
		];
		return $this->update($this->id_br,$data);
	}

	public function deleteBon_reception() {
		return $this->where('id_br', $this->id_br)->delete($this->id_br);
	}

	public function getdetails_bon_reception($id_br = null) {
		$builder = $this->db->table('vue_details_bon_reception');
		
		if ($id_br !== null) {
			$builder->where('numero_bon_reception', $id_br);
		}
		$query = $builder->get();
		
		return $query->getRowArray();
	}
}
