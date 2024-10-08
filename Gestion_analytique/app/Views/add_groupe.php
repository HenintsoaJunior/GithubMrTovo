<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/submit-groupe-form') ?>" method="post">
					<div class="form-group">
						<label for="id_groupe">Id_groupe</label>
						<input type="number" class="form-control" id="id_groupe" name="id_groupe" />
					</div>
					<div class="form-group">
						<label for="nom_groupe">Nom_groupe</label>
						<input type="text" class="form-control" id="nom_groupe" name="nom_groupe" />
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
				<!-- Contenu de la page ici -->
			</div>
		</div>
	</section>
</main>
<?= $this->endSection('content') ?>
