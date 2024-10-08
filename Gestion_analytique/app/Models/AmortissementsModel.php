<?php

namespace App\Models;
use CodeIgniter\Model;

class AmortissementsModel extends Model {
	protected $table = 'amortissements';
	protected $primaryKey = 'id_amortissement_';
	protected $allowedFields = ['duree_amortissement', 'montant_annuel', 'date_debut', 'id_charge'];
	private $id_amortissement_;
	private $duree_amortissement;
	private $montant_annuel;
	private $date_debut;
	private $id_charge;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_amortissement_ = $data['id_amortissement_'] ?? null;
			$this->duree_amortissement = $data['duree_amortissement'] ?? null;
			$this->montant_annuel = $data['montant_annuel'] ?? null;
			$this->date_debut = $data['date_debut'] ?? null;
			$this->id_charge = $data['id_charge'] ?? null;
		}
	}

	public function getId_amortissement_() {
		return $this->id_amortissement_;
	}

	public function getDuree_amortissement() {
		return $this->duree_amortissement;
	}

	public function getMontant_annuel() {
		return $this->montant_annuel;
	}

	public function getDate_debut() {
		return $this->date_debut;
	}

	public function getId_charge() {
		return $this->id_charge;
	}

	public function setId_amortissement_($id_amortissement_) {
		$this->id_amortissement_ = $id_amortissement_;
	}

	public function setDuree_amortissement($duree_amortissement) {
		$this->duree_amortissement = $duree_amortissement;
	}

	public function setMontant_annuel($montant_annuel) {
		$this->montant_annuel = $montant_annuel;
	}

	public function setDate_debut($date_debut) {
		$this->date_debut = $date_debut;
	}

	public function setId_charge($id_charge) {
		$this->id_charge = $id_charge;
	}

	public function getAllAmortissementsPaginate() {
		return $this->orderBy('id_amortissement_', 'DESC')->paginate(5);
	}

	public function getAllAmortissements() {
		return $this->orderBy('id_amortissement_', 'DESC')->findAll();
	}

	public function getAmortissementById($id) {
		return $this->where('id_amortissement_', $id)->first();
	}

	public function createAmortissement() {
		$data = [
			'duree_amortissement' => $this->duree_amortissement,
			'montant_annuel' => $this->montant_annuel,
			'date_debut' => $this->date_debut,
			'id_charge' => $this->id_charge,
		];
		return $this->insert($data);
	}

	public function updateAmortissement() {
		$data = [
			'duree_amortissement' => $this->duree_amortissement,
			'montant_annuel' => $this->montant_annuel,
			'date_debut' => $this->date_debut,
			'id_charge' => $this->id_charge,
		];
		return $this->update($this->id_amortissement_,$data);
	}

	public function deleteAmortissement() {
		return $this->where('id_amortissement_', $this->id_amortissement_)->delete($this->id_amortissement_);
	}
}
