		<?php $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/update-unite') ?>" method="post">
					<div class="form-group">
						<label for="id_unite">Id_unite</label>
						<input type="number" class="form-control" id="id_unite" name="id_unite" value="<?= $unite_obj['id_unite']; ?>" />
					</div>
					<div class="form-group">
						<label for="unite">Unite</label>
						<input type="text" class="form-control" id="unite" name="unite" value="<?= $unite_obj['unite']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
