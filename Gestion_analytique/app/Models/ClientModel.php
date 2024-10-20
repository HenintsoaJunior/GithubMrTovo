<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientModel extends Model {
	protected $table = 'client';
	protected $primaryKey = 'id_client';
	protected $allowedFields = ['nom', 'compte'];
	private $id_client;
	private $nom;
	private $compte;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_client = $data['id_client'] ?? null;
			$this->nom = $data['nom'] ?? null;
			$this->compte = $data['compte'] ?? null;
		}
	}

	public function getId_client() {
		return $this->id_client;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getCompte() {
		return $this->compte;
	}

	public function setId_client($id_client) {
		$this->id_client = $id_client;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setCompte($compte) {
		$this->compte = $compte;
	}

	public function getAllClient() {
		return $this->orderBy('id_client', 'DESC')->findAll();
	}
	public function getAllClientPaginate() {
		return $this->orderBy('id_client', 'DESC')->paginate(5);
	}

	public function getClientById($id) {
		return $this->where('id_client', $id)->first();
	}

	public function createClient() {
		$data = [
			'nom' => $this->nom,
			'compte' => $this->compte,
		];
		return $this->insert($data);
	}

	public function updateClient() {
		$data = [
			'nom' => $this->nom,
			'compte' => $this->compte,
		];
		return $this->update($this->id_client,$data);
	}

	public function deleteClient() {
		return $this->where('id_client', $this->id_client)->delete($this->id_client);
	}
}
