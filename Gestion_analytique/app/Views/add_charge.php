<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/submit-charge-form') ?>" method="post">
					<div class="form-group">
						<label for="id_charge">Id_charge</label>
						<input type="number" class="form-control" id="id_charge" name="id_charge" />
					</div>
					<div class="form-group">
						<label for="charge">Charge</label>
						<input type="text" class="form-control" id="charge" name="charge" />
					</div>
					<div class="form-group">
						<label for="montant_total">Montant_total</label>
						<input type="number" class="form-control" id="montant_total" name="montant_total" />
					</div>
					<div class="form-group">
						<label for="id_exercice">Id_exercice</label>
						<select class="form-control" id="id_exercice" name="id_exercice">
							<option value="">All</option>
							<?php foreach ($exercices as $exercice): ?>
							<option value="<?= $exercice['id_exercice']; ?>"><?= $exercice['date_debut']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_groupe">Id_groupe</label>
						<select class="form-control" id="id_groupe" name="id_groupe">
							<option value="">All</option>
							<?php foreach ($groupes as $groupe): ?>
							<option value="<?= $groupe['id_groupe']; ?>"><?= $groupe['nom_groupe']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_unite">Id_unite</label>
						<select class="form-control" id="id_unite" name="id_unite">
							<option value="">All</option>
							<?php foreach ($unites as $unite): ?>
							<option value="<?= $unite['id_unite']; ?>"><?= $unite['unite']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_type_charge">Id_type_charge</label>
						<select class="form-control" id="id_type_charge" name="id_type_charge">
							<option value="">All</option>
							<?php foreach ($type_charges as $type_charge): ?>
							<option value="<?= $type_charge['id_type_charge']; ?>"><?= $type_charge['charge']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<div class="form-group">
						<label for="id_nature_charge">Id_nature_charge</label>
						<select class="form-control" id="id_nature_charge" name="id_nature_charge">
							<option value="">All</option>
							<?php foreach ($nature_charges as $nature_charge): ?>
							<option value="<?= $nature_charge['id_nature_charge']; ?>"><?= $nature_charge['nature']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
