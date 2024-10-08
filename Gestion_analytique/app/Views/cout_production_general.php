<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
			<div class="row w-100">
				<form action="<?= site_url('/cout_production_general-form') ?>" method="post">
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
                        <th>COUT DE PRODUCTION GENERAL</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($cout_production_general): ?>
                        <?php foreach ($cout_production_general as $cp): ?>
                        <tr>
                            <td>Unite D'Oeuvre</td>
                            <td>KG</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td><?= $cp['nombre_utilise']?></td>
                        </tr>
                        <tr>
                            <td>Cout Elevage</td>
                            <td><?= number_format($cp['cout_elevage'], 2) ?></td>
                        </tr>
                        <tr>
                            <td>Cout Production</td>
                            <td><?= number_format($cp['cout_production'], 2) ?></td>
                        </tr>
                        <tr>
                            <td>Cout Totaux</td>
                            <td><?= number_format($cp['cout_total'], 2) ?></td>
                        </tr>
                        <tr>
                            <td><strong>Cout 1 Poisson (Emballer)</strong></td>
                            <td><strong><?= number_format($cp['cout_poisson'], 2) ?></strong></td>
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
