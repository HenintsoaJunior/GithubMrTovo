<?php

namespace App\Models;
use CodeIgniter\Model;

class ExercicesModel extends Model {
	protected $table = 'exercices';
	protected $primaryKey = 'id_exercice';
	protected $allowedFields = ['date_debut', 'date_fin'];
	private $id_exercice;
	private $date_debut;
	private $date_fin;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_exercice = $data['id_exercice'] ?? null;
			$this->date_debut = $data['date_debut'] ?? null;
			$this->date_fin = $data['date_fin'] ?? null;
		}
	}

	public function getId_exercice() {
		return $this->id_exercice;
	}

	public function getDate_debut() {
		return $this->date_debut;
	}

	public function getDate_fin() {
		return $this->date_fin;
	}

	public function setId_exercice($id_exercice) {
		$this->id_exercice = $id_exercice;
	}

	public function setDate_debut($date_debut) {
		$this->date_debut = $date_debut;
	}

	public function setDate_fin($date_fin) {
		$this->date_fin = $date_fin;
	}

	public function getAllExercices() {
		return $this->orderBy('id_exercice', 'DESC')->paginate(5);
	}

	public function getExerciceById($id) {
		return $this->where('id_exercice', $id)->first();
	}

	public function createExercice() {
		$data = [
			'date_debut' => $this->date_debut,
			'date_fin' => $this->date_fin,
		];
		return $this->insert($data);
	}

	public function updateExercice() {
		$data = [
			'date_debut' => $this->date_debut,
			'date_fin' => $this->date_fin,
		];
		return $this->update($this->id_exercice,$data);
	}

	public function deleteExercice() {
		return $this->where('id_exercice', $this->id_exercice)->delete($this->id_exercice);
	}
}
