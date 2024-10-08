<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <section class="section profile">
        <div class="container">
            <form method="GET" action="<?= base_url('global'); ?>" class="mb-4">
				<div class="row w-100">
					<div class="col">
                        <input type="text" name="rubrique" class="form-control" placeholder="Rubrique">
                    </div>
                    <div class="col">
                        <input type="number" name="annee" class="form-control" placeholder="Année">
                    </div>
				</div>
				<div class="row mt-4">
                    <div class="col">
                        <input type="date" name="date_debut" class="form-control" placeholder="Date de Début">
                    </div>
                    <div class="col">
                        <input type="date" name="date_fin" class="form-control" placeholder="Date de Fin">
                    </div>
                </div>
                <div class="row mt-4">
					<div class="col">
                        <input type="text" name="unite" class="form-control" placeholder="Unité">
                    </div>
                    <div class="col">
                        <input type="text" name="nature" class="form-control" placeholder="Nature">
                    </div>
				</div>
				<div class="row mt-4">
                    <div class="form-group">
                        <input type="text" name="type_charge" class="form-control" placeholder="Type Charge">
                    </div>
					
                </div>
				<div class="row mt-4">
				
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Rechercher</button>
                    </div>
				</div>
            </form>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Rubrique</th>
                            <th colspan="3">Exercice</th>
                            <th>Unite</th>
                            <th>Nature</th>
                            <th>Type Charge</th>
                            <th>Centre</th>
                            <th>Total</th>
                        </tr>
                        <tr>
                            <th></th>
                            <th>Année</th>
                            <th>Date de Début</th>
                            <th>Date de Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($results): ?>
                            <?php foreach ($results as $gb): ?>
                                <tr style="<?= $gb['type_charges'] === 'Charge non incorporable' ? 'background-color: rgb(190, 0, 0);' : ''; ?>">
                                    <td><?= htmlspecialchars($gb['rubriques']) ?></td>
                                    <td><?= htmlspecialchars($gb['annee']) ?></td>
                                    <td><?= htmlspecialchars($gb['date_debut']) ?></td>
                                    <td><?= htmlspecialchars($gb['date_fin']) ?></td>
                                    <td><?= htmlspecialchars($gb['unite']) ?></td>
                                    <td><?= htmlspecialchars($gb['nature']) ?></td>
                                    <td><?= htmlspecialchars($gb['type_charges']) ?></td>
                                    <td>
                                        <a href="<?= base_url('voir-centre/' . $gb['id_charge']); ?>">
                                            <img src="<?= base_url('assets/img/accounting.png') ?>" alt="" style="width: 50px; height: 50px;">
                                        </a>
                                    </td>
                                    <td><?= number_format($gb['total'], 2) ?> Ar</td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>

                <?php echo $pager->links(); ?>
            </div>
            
        
    </section>
</main>
<?= $this->endSection('content') ?>
