		<?php $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/update-type_charge') ?>" method="post">
					<div class="form-group">
						<label for="id_type_charge">Id_type_charge</label>
						<input type="number" class="form-control" id="id_type_charge" name="id_type_charge" value="<?= $type_charge_obj['id_type_charge']; ?>" />
					</div>
					<div class="form-group">
						<label for="charge">Charge</label>
						<input type="text" class="form-control" id="charge" name="charge" value="<?= $type_charge_obj['charge']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
