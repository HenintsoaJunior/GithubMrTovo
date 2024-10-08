		<?php $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/update-centre') ?>" method="post">
					<div class="form-group">
						<label for="id_centre">Id_centre</label>
						<input type="number" class="form-control" id="id_centre" name="id_centre" value="<?= $centre_obj['id_centre']; ?>" />
					</div>
					<div class="form-group">
						<label for="nom">Nom</label>
						<input type="text" class="form-control" id="nom" name="nom" value="<?= $centre_obj['nom']; ?>" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
