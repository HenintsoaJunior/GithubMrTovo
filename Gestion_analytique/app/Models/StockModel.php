<?php

namespace App\Models;
use CodeIgniter\Model;

class StockModel extends Model {
	protected $table = 'stock';
	protected $primaryKey = 'id_stock';
	protected $allowedFields = ['id_produit', 'debit', 'credit', 'date_stock'];
	private $id_stock;
	private $id_produit;
	private $debit;
	private $credit;
	private $date_stock;

	public function __construct($data = null) {
		parent::__construct();
		if ($data) {
			$this->id_stock = $data['id_stock'] ?? null;
			$this->id_produit = $data['id_produit'] ?? null;
			$this->debit = $data['debit'] ?? null;
			$this->credit = $data['credit'] ?? null;
			$this->date_stock = $data['date_stock'] ?? null;
		}
	}

	public function getId_stock() {
		return $this->id_stock;
	}

	public function getId_produit() {
		return $this->id_produit;
	}

	public function getDebit() {
		return $this->debit;
	}

	public function getCredit() {
		return $this->credit;
	}

	public function getDate_stock() {
		return $this->date_stock;
	}

	public function setId_stock($id_stock) {
		$this->id_stock = $id_stock;
	}

	public function setId_produit($id_produit) {
		$this->id_produit = $id_produit;
	}

	public function setDebit($debit) {
		$this->debit = $debit;
	}

	public function setCredit($credit) {
		$this->credit = $credit;
	}

	public function setDate_stock($date_stock) {
		$this->date_stock = $date_stock;
	}

	public function getAllStock() {
		return $this->orderBy('id_stock', 'DESC')->paginate(5);
	}

	public function getStockById($id) {
		return $this->where('id_stock', $id)->first();
	}

	public function createStock() {
		$data = [
			'id_produit' => $this->id_produit,
			'debit' => $this->debit,
			'credit' => $this->credit,
			'date_stock' => $this->date_stock,
		];
		return $this->insert($data);
	}

	public function updateStock() {
		$data = [
			'id_produit' => $this->id_produit,
			'debit' => $this->debit,
			'credit' => $this->credit,
			'date_stock' => $this->date_stock,
		];
		return $this->update($this->id_stock,$data);
	}

	public function deleteStock() {
		return $this->where('id_stock', $this->id_stock)->delete($this->id_stock);
	}
}
