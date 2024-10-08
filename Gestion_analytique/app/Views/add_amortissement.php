<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/submit-amortissement-form') ?>" method="post">
					<div class="form-group">
						<label for="id_amortissement_">Id_amortissement_</label>
						<input type="number" class="form-control" id="id_amortissement_" name="id_amortissement_" />
					</div>
					<div class="form-group">
						<label for="duree_amortissement">Duree_amortissement</label>
						<input type="number" class="form-control" id="duree_amortissement" name="duree_amortissement" />
					</div>
					<div class="form-group">
						<label for="montant_annuel">Montant_annuel</label>
						<input type="number" class="form-control" id="montant_annuel" name="montant_annuel" />
					</div>
					<div class="form-group">
						<label for="date_debut">Date_debut</label>
						<input type="text" class="form-control" id="date_debut" name="date_debut" />
					</div>
					<div class="form-group">
						<label for="id_charge">Id_charge</label>
						<select class="form-control" id="id_charge" name="id_charge">
							<option value="">All</option>
							<?php foreach ($charges as $charge): ?>
							<option value="<?= $charge['id_charge']; ?>"><?= $charge['charge']; ?></option>
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
