<?php

namespace App\Models;
use CodeIgniter\Model;

class UnitesModel extends Model {
	protected $table = 'unites';
	protected $primaryKey = 'id_unite';
	protected $allowedFields = ['unite'];
	private $id_unite;
	private $unite;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_unite = $data['id_unite'] ?? null;
			$this->unite = $data['unite'] ?? null;
		}
	}

	public function getId_unite() {
		return $this->id_unite;
	}

	public function getUnite() {
		return $this->unite;
	}

	public function setId_unite($id_unite) {
		$this->id_unite = $id_unite;
	}

	public function setUnite($unite) {
		$this->unite = $unite;
	}

	public function getAllUnitesPaginate() {
		return $this->orderBy('id_unite', 'DESC')->paginate(5);
	}

	public function getAllUnites() {
		return $this->orderBy('id_unite', 'DESC')->findAll();
	}

	public function getUniteById($id) {
		return $this->where('id_unite', $id)->first();
	}

	public function createUnite() {
		$data = [
			'unite' => $this->unite,
		];
		return $this->insert($data);
	}

	public function updateUnite() {
		$data = [
			'unite' => $this->unite,
		];
		return $this->update($this->id_unite,$data);
	}

	public function deleteUnite() {
		return $this->where('id_unite', $this->id_unite)->delete($this->id_unite);
	}
}
