		<?php $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/update-liaison_charge_centre') ?>" method="post">
					<div class="form-group">
						<label for="id_liaison">Id_liaison</label>
						<input type="number" class="form-control" id="id_liaison" name="id_liaison" value="<?= $liaison_charge_centre_obj['id_liaison']; ?>" />
					</div>
					<div class="form-group">
						<label for="id_centre">Id_centre</label>
						<select class="form-control" id="id_centre" name="id_centre">
							<option value="">Select an option</option>
							<?php foreach ($centres as $centre): ?>
							<option value="<?= $centre['id_centre']; ?>" <?= ($liaison_charge_centre_obj['id_centre'] == $centre['id_centre']) ? 'selected' : ''; ?>><?= $centre['nom']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_charge">Id_charge</label>
						<select class="form-control" id="id_charge" name="id_charge">
							<option value="">Select an option</option>
							<?php foreach ($charges as $charge): ?>
							<option value="<?= $charge['id_charge']; ?>" <?= ($liaison_charge_centre_obj['id_charge'] == $charge['id_charge']) ? 'selected' : ''; ?>><?= $charge['charge']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="montant">Montant</label>
						<input type="number" class="form-control" id="montant" name="montant" value="<?= $liaison_charge_centre_obj['montant']; ?>" />
					</div>
					<div class="form-group">
						<label for="date_charge">Date_charge</label>
						<input type="text" class="form-control" id="date_charge" name="date_charge" value="<?= $liaison_charge_centre_obj['date_charge']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
