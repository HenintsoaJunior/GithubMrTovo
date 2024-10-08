<?php

namespace App\Models;
use CodeIgniter\Model;

class Nature_chargesModel extends Model {
	protected $table = 'nature_charges';
	protected $primaryKey = 'id_nature_charge';
	protected $allowedFields = ['nature'];
	private $id_nature_charge;
	private $nature;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_nature_charge = $data['id_nature_charge'] ?? null;
			$this->nature = $data['nature'] ?? null;
		}
	}

	public function getId_nature_charge() {
		return $this->id_nature_charge;
	}

	public function getNature() {
		return $this->nature;
	}

	public function setId_nature_charge($id_nature_charge) {
		$this->id_nature_charge = $id_nature_charge;
	}

	public function setNature($nature) {
		$this->nature = $nature;
	}

	public function getAllNature_chargesPaginate() {
		return $this->orderBy('id_nature_charge', 'DESC')->paginate(5);
	}

	public function getAllNature_charges() {
		return $this->orderBy('id_nature_charge', 'DESC')->findAll();
	}

	public function getNature_chargeById($id) {
		return $this->where('id_nature_charge', $id)->first();
	}

	public function createNature_charge() {
		$data = [
			'nature' => $this->nature,
		];
		return $this->insert($data);
	}

	public function updateNature_charge() {
		$data = [
			'nature' => $this->nature,
		];
		return $this->update($this->id_nature_charge,$data);
	}

	public function deleteNature_charge() {
		return $this->where('id_nature_charge', $this->id_nature_charge)->delete($this->id_nature_charge);
	}
}
