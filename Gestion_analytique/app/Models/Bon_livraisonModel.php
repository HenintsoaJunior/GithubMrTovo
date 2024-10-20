<?php

namespace App\Models;
use CodeIgniter\Model;

class Bon_livraisonModel extends Model {
	protected $table = 'bon_livraison';
	protected $primaryKey = 'id_bl';
	protected $allowedFields = ['id_br', 'date_livraison'];
	private $id_bl;
	private $id_br;
	private $date_livraison;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_bl = $data['id_bl'] ?? null;
			$this->id_br = $data['id_br'] ?? null;
			$this->date_livraison = $data['date_livraison'] ?? null;
		}
	}

	public function getId_bl() {
		return $this->id_bl;
	}

	public function getId_br() {
		return $this->id_br;
	}

	public function getDate_livraison() {
		return $this->date_livraison;
	}

	public function setId_bl($id_bl) {
		$this->id_bl = $id_bl;
	}

	public function setId_br($id_br) {
		$this->id_br = $id_br;
	}

	public function setDate_livraison($date_livraison) {
		$this->date_livraison = $date_livraison;
	}

	public function getAllBon_livraison() {
		return $this->orderBy('id_bl', 'DESC')->findAll();
	}

	public function getAllBon_livraisonPaginate() {
		return $this->orderBy('id_bl', 'DESC')->paginate(5);
	}


	public function getBon_livraisonById($id) {
		return $this->where('id_bl', $id)->first();
	}

	public function createBon_livraison() {
		$data = [
			'id_br' => $this->id_br,
			'date_livraison' => $this->date_livraison,
		];
		return $this->insert($data);
	}

	public function updateBon_livraison() {
		$data = [
			'id_br' => $this->id_br,
			'date_livraison' => $this->date_livraison,
		];
		return $this->update($this->id_bl,$data);
	}

	public function deleteBon_livraison() {
		return $this->where('id_bl', $this->id_bl)->delete($this->id_bl);
	}

	public function getBon_livraisonDetails($id_bl = null) {
		$builder = $this->db->table('v_bon_livraison');
		
		if ($id_bl !== null) {
			$builder->where('id_bon_livraison', $id_bl);
		}
		$query = $builder->get();
		
		return $query->getRowArray();
	}
}
