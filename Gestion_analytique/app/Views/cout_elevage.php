<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/cout_elevage-form') ?>" method="post">
					<div class="form-group">
						<label for="id_centre">Nombre</label>
						<input type="number" class="form-control" id="nombre" name="nombre" />
					</div>
					
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</section>
    <br>
    <section class="section profile">
		<div class="container">
			<div class="row">
				<div class="table-container">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>COUT DU KG DE POISSON</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($cout_elevage): ?>
                            <?php foreach ($cout_elevage as $ce): ?>
                            <tr>
                                <td>Unité D'Oeuvre</td>
                                <td>KG</td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><?= $ce['nombre_utilise'] ?></td>
                            </tr>
                            <tr>
                                <td>Coût Élevage</td>
                                <td><?= number_format($ce['cout_elevage'], 2) ?></td>
                            </tr>
                            <tr>
                                <td><strong>Coût de 1 Poisson (KG)</strong></td>
                                <td><strong><?= number_format($ce['cout_poisson_kg'], 2) ?></strong></td>
                            </tr>

                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>


			</div>
		</div>
	</div>
	</section>
</main>
<?= $this->endSection('content') ?>
