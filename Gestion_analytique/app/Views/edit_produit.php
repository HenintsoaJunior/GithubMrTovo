<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="form-container">
				<form action="<?= site_url('/update-produit') ?>" method="post">
					<div class="form-group">
						<label for="id_produit">Id_produit</label>
						<input type="number" class="form-control" id="id_produit" name="id_produit" value="<?= $produit_obj['id_produit']; ?>" />
					</div>
					<div class="form-group">
						<label for="produit">Produit</label>
						<input type="text" class="form-control" id="produit" name="produit" value="<?= $produit_obj['produit']; ?>" />
					</div>
					<div class="form-group">
						<label for="id_unite">Id_unite</label>
						<select class="form-control" id="id_unite" name="id_unite">
							<option value="">Select an option</option>
							<?php foreach ($unites as $unite): ?>
							<option value="<?= $unite['id_unite']; ?>" <?= ($produit_obj['id_unite'] == $unite['id_unite']) ? 'selected' : ''; ?>><?= $unite['unite']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="prixvente">Prixvente</label>
						<input type="number" class="form-control" id="prixvente" name="prixvente" value="<?= $produit_obj['prixvente']; ?>" />
					</div>
					<div class="form-group">
						<label for="id_type_produit">Id_type_produit</label>
						<select class="form-control" id="id_type_produit" name="id_type_produit">
							<option value="">Select an option</option>
							<?php foreach ($type_produit as $type_produit): ?>
							<option value="<?= $type_produit['id_type_produit']; ?>" <?= ($produit_obj['id_type_produit'] == $type_produit['id_type_produit']) ? 'selected' : ''; ?>><?= $type_produit['type']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
	</section>
</div>
<?= $this->endSection('content1') ?>
