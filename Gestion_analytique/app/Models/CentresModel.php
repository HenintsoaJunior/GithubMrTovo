<?php

namespace App\Models;
use CodeIgniter\Model;

class CentresModel extends Model {
	protected $table = 'centres';
	protected $primaryKey = 'id_centre';
	protected $allowedFields = ['nom'];
	private $id_centre;
	private $nom;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_centre = $data['id_centre'] ?? null;
			$this->nom = $data['nom'] ?? null;
		}
	}

	public function getId_centre() {
		return $this->id_centre;
	}

	public function getNom() {
		return $this->nom;
	}

	public function setId_centre($id_centre) {
		$this->id_centre = $id_centre;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function getAllCentresPaginate() {
		return $this->orderBy('id_centre', 'DESC')->paginate(5);
	}

	public function getAllCentres() {
		return $this->orderBy('id_centre', 'DESC')->findAll();
	}

	public function getCentreById($id) {
		return $this->where('id_centre', $id)->first();
	}

	public function createCentre() {
		$data = [
			'nom' => $this->nom,
		];
		return $this->insert($data);
	}

	public function updateCentre() {
		$data = [
			'nom' => $this->nom,
		];
		return $this->update($this->id_centre,$data);
	}

	public function deleteCentre() {
		return $this->where('id_centre', $this->id_centre)->delete($this->id_centre);
	}
}
