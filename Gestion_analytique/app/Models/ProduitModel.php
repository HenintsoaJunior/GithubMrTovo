<?php

namespace App\Models;
use CodeIgniter\Model;

class ProduitModel extends Model {
	protected $table = 'produit';
	protected $primaryKey = 'id_produit';
	protected $allowedFields = ['produit', 'id_unite', 'prixvente', 'id_type_produit'];
	private $id_produit;
	private $produit;
	private $id_unite;
	private $prixvente;
	private $id_type_produit;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_produit = $data['id_produit'] ?? null;
			$this->produit = $data['produit'] ?? null;
			$this->id_unite = $data['id_unite'] ?? null;
			$this->prixvente = $data['prixvente'] ?? null;
			$this->id_type_produit = $data['id_type_produit'] ?? null;
		}
	}

	public function getId_produit() {
		return $this->id_produit;
	}

	public function getProduit() {
		return $this->produit;
	}

	public function getId_unite() {
		return $this->id_unite;
	}

	public function getPrixvente() {
		return $this->prixvente;
	}

	public function getId_type_produit() {
		return $this->id_type_produit;
	}

	public function setId_produit($id_produit) {
		$this->id_produit = $id_produit;
	}

	public function setProduit($produit) {
		$this->produit = $produit;
	}

	public function setId_unite($id_unite) {
		$this->id_unite = $id_unite;
	}

	public function setPrixvente($prixvente) {
		$this->prixvente = $prixvente;
	}

	public function setId_type_produit($id_type_produit) {
		$this->id_type_produit = $id_type_produit;
	}

	public function getAllProduit() {
		return $this->orderBy('id_produit', 'DESC')->findAll();
	}

	public function getAllProduitPaginate() {
		return $this->orderBy('id_produit', 'DESC')->paginate(5);
	}

	public function getProduitById($id) {
		return $this->where('id_produit', $id)->first();
	}

	public function createProduit() {
		$data = [
			'produit' => $this->produit,
			'id_unite' => $this->id_unite,
			'prixvente' => $this->prixvente,
			'id_type_produit' => $this->id_type_produit,
		];
		return $this->insert($data);
	}

	public function updateProduit() {
		$data = [
			'produit' => $this->produit,
			'id_unite' => $this->id_unite,
			'prixvente' => $this->prixvente,
			'id_type_produit' => $this->id_type_produit,
		];
		return $this->update($this->id_produit,$data);
	}

	public function deleteProduit() {
		return $this->where('id_produit', $this->id_produit)->delete($this->id_produit);
	}


	public function getQuantiteProduitStock($id_produit = null, $quantite_demander = 0) {
		$builder = $this->db->table('v_quantite_produit_stock');
		
		if ($id_produit !== null) {
			$builder->where('id_produit', $id_produit);
		}
		$query = $builder->get();
		
		return $query->getRowArray();
	}
	

	public function get_produit_unite($id_produit = null) {
		$builder = $this->db->table('v_produit_unite');
		
		if ($id_produit !== null) {
			$builder->where('id_produit', $id_produit);
		}
	
		$builder->select('unite');
		$query = $builder->get();
		
		return $query->getRowArray()['unite'] ?? null;
	}
	

	public function getComptaSousEcriture() {
		$builder = $this->db->table('v_compta_sous_ecriture');
		$query = $builder->get();
	
		if ($query->getNumRows() > 0) {
			return $query->getResultArray();
		} else {
			return [];
		}
	}
	

}
