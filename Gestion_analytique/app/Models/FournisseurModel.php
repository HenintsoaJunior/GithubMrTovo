<?php

namespace App\Models;
use CodeIgniter\Model;

class FournisseurModel extends Model {
	protected $table = 'fournisseur';
	protected $primaryKey = 'id_fournisseur';
	protected $allowedFields = ['nom', 'compte'];
	private $id_fournisseur;
	private $nom;
	private $compte;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_fournisseur = $data['id_fournisseur'] ?? null;
			$this->nom = $data['nom'] ?? null;
			$this->compte = $data['compte'] ?? null;
		}
	}

	public function getId_fournisseur() {
		return $this->id_fournisseur;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getCompte() {
		return $this->compte;
	}

	public function setId_fournisseur($id_fournisseur) {
		$this->id_fournisseur = $id_fournisseur;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setCompte($compte) {
		$this->compte = $compte;
	}

	public function getAllFournisseur() {
		return $this->orderBy('id_fournisseur', 'DESC')->findAll();
	}
	
	public function getAllFournisseurPaginate() {
		return $this->orderBy('id_fournisseur', 'DESC')->paginate(5);
	}

	public function getFournisseurById($id) {
		return $this->where('id_fournisseur', $id)->first();
	}

	public function createFournisseur() {
		$data = [
			'nom' => $this->nom,
			'compte' => $this->compte,
		];
		return $this->insert($data);
	}

	public function updateFournisseur() {
		$data = [
			'nom' => $this->nom,
			'compte' => $this->compte,
		];
		return $this->update($this->id_fournisseur,$data);
	}

	public function deleteFournisseur() {
		return $this->where('id_fournisseur', $this->id_fournisseur)->delete($this->id_fournisseur);
	}
}
