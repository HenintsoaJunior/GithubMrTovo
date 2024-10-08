<?php

namespace App\Models;
use CodeIgniter\Model;

class Liaison_charge_centreModel extends Model {
	protected $table = 'liaison_charge_centre';
	protected $primaryKey = 'id_liaison';
	protected $allowedFields = ['id_centre', 'id_charge', 'pourcentage'];
	private $id_liaison;
	private $id_centre;
	private $id_charge;
	private $pourcentage;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_liaison = $data['id_liaison'] ?? null;
			$this->id_centre = $data['id_centre'] ?? null;
			$this->id_charge = $data['id_charge'] ?? null;
			$this->pourcentage = $data['pourcentage'] ?? null;
			
		}
	}

	public function getId_liaison() {
		return $this->id_liaison;
	}

	public function getId_centre() {
		return $this->id_centre;
	}

	public function getId_charge() {
		return $this->id_charge;
	}

	public function getPourcentage() {
		return $this->pourcentage;
	}

	
	public function setId_liaison($id_liaison) {
		$this->id_liaison = $id_liaison;
	}

	public function setId_centre($id_centre) {
		$this->id_centre = $id_centre;
	}

	public function setId_charge($id_charge) {
		$this->id_charge = $id_charge;
	}

	public function setPourcentage($pourcentage) {
		$this->pourcentage = $pourcentage;
	}


	public function getAllLiaison_charge_centrePaginate() {
		return $this->orderBy('id_liaison', 'DESC')->paginate(5);
	}

	public function getAllLiaison_charge_centre() {
		return $this->orderBy('id_liaison', 'DESC')->findAll();
	}

	public function getLiaison_charge_centreById($id) {
		return $this->where('id_liaison', $id)->first();
	}

	public function createLiaison_charge_centre() {
		$data = [
			'id_centre' => $this->id_centre,
			'id_charge' => $this->id_charge,
			'pourcentage' => $this->pourcentage
		];
		return $this->insert($data);
	}

	public function updateLiaison_charge_centre() {
		$data = [
			'id_centre' => $this->id_centre,
			'id_charge' => $this->id_charge,
			'pourcentage' => $this->pourcentage
		];
		return $this->update($this->id_liaison,$data);
	}

	public function deleteLiaison_charge_centre() {
		return $this->where('id_liaison', $this->id_liaison)->delete($this->id_liaison);
	}
}
