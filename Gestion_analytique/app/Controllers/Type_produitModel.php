<?php

namespace App\Models;
use CodeIgniter\Model;

class Type_produitModel extends Model {
	protected $table = 'type_produit';
	protected $primaryKey = 'id_type_produit';
	protected $allowedFields = ['type'];
	private $id_type_produit;
	private $type;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_type_produit = $data['id_type_produit'] ?? null;
			$this->type = $data['type'] ?? null;
		}
	}

	public function getId_type_produit() {
		return $this->id_type_produit;
	}

	public function getType() {
		return $this->type;
	}

	public function setId_type_produit($id_type_produit) {
		$this->id_type_produit = $id_type_produit;
	}

	public function setType($type) {
		$this->type = $type;
	}

	public function getAllType_produit() {
		return $this->orderBy('id_type_produit', 'DESC')->paginate(5);
	}

	public function getType_produitById($id) {
		return $this->where('id_type_produit', $id)->first();
	}

	public function createType_produit() {
		$data = [
			'type' => $this->type,
		];
		return $this->insert($data);
	}

	public function updateType_produit() {
		$data = [
			'type' => $this->type,
		];
		return $this->update($this->id_type_produit,$data);
	}

	public function deleteType_produit() {
		return $this->where('id_type_produit', $this->id_type_produit)->delete($this->id_type_produit);
	}
}
