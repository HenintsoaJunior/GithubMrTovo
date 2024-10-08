<?php

namespace App\Models;
use CodeIgniter\Model;
use Exception;

class ChargesModel extends Model {
	protected $table = 'charges';
	protected $primaryKey = 'id_charge';
	protected $allowedFields = ['charge', 'montant_total', 'id_exercice', 'id_groupe', 'id_unite', 'id_type_charge', 'id_nature_charge'];
	private $id_charge;
	private $charge;
	private $montant_total;
	private $id_exercice;
	private $id_groupe;
	private $id_unite;
	private $id_type_charge;
	private $id_nature_charge;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_charge = $data['id_charge'] ?? null;
			$this->charge = $data['charge'] ?? null;
			$this->montant_total = $data['montant_total'] ?? null;
			$this->id_exercice = $data['id_exercice'] ?? null;
			$this->id_groupe = $data['id_groupe'] ?? null;
			$this->id_unite = $data['id_unite'] ?? null;
			$this->id_type_charge = $data['id_type_charge'] ?? null;
			$this->id_nature_charge = $data['id_nature_charge'] ?? null;
		}
	}

	public function getId_charge() {
		return $this->id_charge;
	}

	public function getCharge() {
		return $this->charge;
	}

	public function getMontant_total() {
		return $this->montant_total;
	}

	public function getId_exercice() {
		return $this->id_exercice;
	}

	public function getId_groupe() {
		return $this->id_groupe;
	}

	public function getId_unite() {
		return $this->id_unite;
	}

	public function getId_type_charge() {
		return $this->id_type_charge;
	}

	public function getId_nature_charge() {
		return $this->id_nature_charge;
	}

	public function setId_charge($id_charge) {
		$this->id_charge = $id_charge;
	}

	public function setCharge($charge) {
		$this->charge = $charge;
	}

	public function setMontant_total($montant_total) {
		$this->montant_total = $montant_total;
	}

	public function setId_exercice($id_exercice) {
		$this->id_exercice = $id_exercice;
	}

	public function setId_groupe($id_groupe) {
		$this->id_groupe = $id_groupe;
	}

	public function setId_unite($id_unite) {
		$this->id_unite = $id_unite;
	}

	public function setId_type_charge($id_type_charge) {
		$this->id_type_charge = $id_type_charge;
	}

	public function setId_nature_charge($id_nature_charge) {
		$this->id_nature_charge = $id_nature_charge;
	}

	public function getAllCharges() {
		return $this->orderBy('id_charge', 'DESC')->findAll();
	}

	public function getAllChargesPaginate() {
		return $this->orderBy('id_charge', 'DESC')->paginate(5);
	}

	public function getChargeById($id) {
		return $this->where('id_charge', $id)->first();
	}

	public function createCharge($charge, $date_debut, $date_fin) {
		// Log les valeurs pour le débogage
		log_message('debug', 'Charge: ' . $charge);
		log_message('debug', 'Date début: ' . $date_debut);
		log_message('debug', 'Date fin: ' . $date_fin);
	
		// Vérifiez si une charge existe déjà avec les mêmes dates
		$existingCharge = $this->db->query("
			SELECT COUNT(*) as count 
			FROM charges c 
			JOIN exercices e ON c.id_exercice = e.id_exercice 
			WHERE c.charge = ? 
			AND (e.date_debut <= ? AND e.date_fin >= ?)
		", [$charge, $date_fin, $date_debut])->getRow();
	
		// Log du résultat de la requête
		log_message('debug', 'Nombre de charges existantes: ' . $existingCharge->count);
	
		// Si une charge existe, lancez une exception
		if ($existingCharge->count > 0) {
			throw new Exception("Une charge existe déjà pour cet exercice avec des dates se chevauchant.");
		}
	
		// Préparez les données pour l'insertion
		$data = [
			'charge' => $charge,
			'montant_total' => $this->montant_total,
			'id_exercice' => $this->id_exercice,
			'id_groupe' => $this->id_groupe,
			'id_unite' => $this->id_unite,
			'id_type_charge' => $this->id_type_charge,
			'id_nature_charge' => $this->id_nature_charge,
		];
	
		return $this->insert($data);
	}
	

	public function updateCharge() {
		$data = [
			'charge' => $this->charge,
			'montant_total' => $this->montant_total,
			'id_exercice' => $this->id_exercice,
			'id_groupe' => $this->id_groupe,
			'id_unite' => $this->id_unite,
			'id_type_charge' => $this->id_type_charge,
			'id_nature_charge' => $this->id_nature_charge,
		];
		return $this->update($this->id_charge,$data);
	}

	public function deleteCharge() {
		return $this->where('id_charge', $this->id_charge)->delete($this->id_charge);
	}
}
