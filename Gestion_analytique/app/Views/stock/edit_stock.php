<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="form-container">
			
				<form action="<?= site_url('/update-stock') ?>" method="post">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id_stock" name="id_stock" value="<?= $stock_obj['id_stock']; ?>" />
					</div>
					<div class="form-group">
						<label for="id_produit">Produit</label>
						<select class="form-control" id="id_produit" name="id_produit">
							<option value="">Select an option</option>
							<?php foreach ($produit as $produit): ?>
							<option value="<?= $produit['id_produit']; ?>" <?= ($stock_obj['id_produit'] == $produit['id_produit']) ? 'selected' : ''; ?>><?= $produit['produit']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="debit">Debit</label>
						<input type="number" class="form-control" id="debit" name="debit" value="<?= $stock_obj['debit']; ?>" />
					</div>
					<div class="form-group">
						<label for="credit">Credit</label>
						<input type="number" class="form-control" id="credit" name="credit" value="<?= $stock_obj['credit']; ?>" />
					</div>
					<div class="form-group">
						<label for="date_stock">Date_stock</label>
						<input type="date" class="form-control" id="date_stock" name="date_stock" value="<?= $stock_obj['date_stock']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
	</section>
</div>
<?= $this->endSection('content1') ?>
