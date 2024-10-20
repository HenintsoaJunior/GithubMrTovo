<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="form-container">
				<form action="<?= site_url('/submit-produit-form') ?>" method="post">
					<div class="form-group">
						<input type="hidden" class="form-control" id="id_produit" name="id_produit" />
					</div>
					<div class="form-group">
						<label for="produit">Produit</label>
						<input type="text" class="form-control" id="produit" name="produit" />
					</div>
					<div class="form-group">
						<label for="id_unite">Unite</label>
						<select class="form-control" id="id_unite" name="id_unite">
							<option value="">All</option>
							<?php foreach ($unites as $unite): ?>
							<option value="<?= $unite['id_unite']; ?>"><?= $unite['unite']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="prixvente">Prix de vente</label>
						<input type="number" class="form-control" id="prixvente" name="prixvente" />
					</div>
					<div class="form-group">
						<label for="id_type_produit">Type Produit</label>
						<select class="form-control" id="id_type_produit" name="id_type_produit">
							<option value="">All</option>
							<?php foreach ($type_produit as $type_produit): ?>
							<option value="<?= $type_produit['id_type_produit']; ?>"><?= $type_produit['type']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
	</section>
</div>
<?= $this->endSection('content1') ?>
