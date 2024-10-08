<?php

namespace App\Models;
use CodeIgniter\Model;

class Type_chargesModel extends Model {
	protected $table = 'type_charges';
	protected $primaryKey = 'id_type_charge';
	protected $allowedFields = ['charge'];
	private $id_type_charge;
	private $charge;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_type_charge = $data['id_type_charge'] ?? null;
			$this->charge = $data['charge'] ?? null;
		}
	}

	public function getId_type_charge() {
		return $this->id_type_charge;
	}

	public function getCharge() {
		return $this->charge;
	}

	public function setId_type_charge($id_type_charge) {
		$this->id_type_charge = $id_type_charge;
	}

	public function setCharge($charge) {
		$this->charge = $charge;
	}

	public function getAllType_chargesPaginate() {
		return $this->orderBy('id_type_charge', 'DESC')->paginate(5);
	}

	public function getAllType_charges() {
		return $this->orderBy('id_type_charge', 'DESC')->findAll();
	}

	public function getType_chargeById($id) {
		return $this->where('id_type_charge', $id)->first();
	}

	public function createType_charge() {
		$data = [
			'charge' => $this->charge,
		];
		return $this->insert($data);
	}

	public function updateType_charge() {
		$data = [
			'charge' => $this->charge,
		];
		return $this->update($this->id_type_charge,$data);
	}

	public function deleteType_charge() {
		return $this->where('id_type_charge', $this->id_type_charge)->delete($this->id_type_charge);
	}
}
