<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
	<section class="section profile">
		<div class="container">
			<div class="row">
				<div class="table-container">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Rubrique</th>
							<th>Unite</th>
                            <th>Nature</th>
                            <th>Centre</th>
                            <th>Montant</th>
                            <th>Pourcentage</th>
                            
						</tr>
					</thead>
					<tbody>
						<?php if ($global_centre_rubrique): ?>
							<?php foreach ($global_centre_rubrique as $gb): ?>
							<tr>
								<td><?=  $gb['rubriques'] ?></td>
								<td><?=  $gb['unite'] ?></td>
								<td><?=  $gb['nature'] ?></td>
                                <td><?=  $gb['centre'] ?></td>
								<td><?=  number_format($gb['montant_calculé'],2)  ?></td>
								<td><?= number_format($gb['pourcentage'], 2) ?>%</td>

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
