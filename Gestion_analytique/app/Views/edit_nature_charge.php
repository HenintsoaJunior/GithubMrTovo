		<?php $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/update-nature_charge') ?>" method="post">
					<div class="form-group">
						<label for="id_nature_charge">Id_nature_charge</label>
						<input type="number" class="form-control" id="id_nature_charge" name="id_nature_charge" value="<?= $nature_charge_obj['id_nature_charge']; ?>" />
					</div>
					<div class="form-group">
						<label for="nature">Nature</label>
						<input type="text" class="form-control" id="nature" name="nature" value="<?= $nature_charge_obj['nature']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
