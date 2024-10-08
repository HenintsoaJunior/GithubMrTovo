<?php

namespace App\Models;
use CodeIgniter\Model;

class GroupesModel extends Model {
	protected $table = 'groupes';
	protected $primaryKey = 'id_groupe';
	protected $allowedFields = ['nom_groupe'];
	private $id_groupe;
	private $nom_groupe;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_groupe = $data['id_groupe'] ?? null;
			$this->nom_groupe = $data['nom_groupe'] ?? null;
		}
	}

	public function getId_groupe() {
		return $this->id_groupe;
	}

	public function getNom_groupe() {
		return $this->nom_groupe;
	}

	public function setId_groupe($id_groupe) {
		$this->id_groupe = $id_groupe;
	}

	public function setNom_groupe($nom_groupe) {
		$this->nom_groupe = $nom_groupe;
	}

	public function getAllGroupesPaginate() {
		return $this->orderBy('id_groupe', 'DESC')->paginate(5);
	}

	public function getAllGroupes() {
		return $this->orderBy('id_groupe', 'DESC')->findAll();
	}

	public function getGroupeById($id) {
		return $this->where('id_groupe', $id)->first();
	}

	public function createGroupe() {
		$data = [
			'nom_groupe' => $this->nom_groupe,
		];
		return $this->insert($data);
	}

	public function updateGroupe() {
		$data = [
			'nom_groupe' => $this->nom_groupe,
		];
		return $this->update($this->id_groupe,$data);
	}

	public function deleteGroupe() {
		return $this->where('id_groupe', $this->id_groupe)->delete($this->id_groupe);
	}
}
