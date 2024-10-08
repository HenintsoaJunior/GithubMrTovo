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
							<th>Id_amortissement_</th>
							<th>Duree_amortissement</th>
							<th>Montant_annuel</th>
							<th>Date_debut</th>
							<th>Id_charge</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($amortissements): ?>
							<?php foreach ($amortissements as $amortissement): ?>
							<tr>
								<td><?=  $amortissement['id_amortissement_'] ?></td>
								<td><?=  $amortissement['duree_amortissement'] ?></td>
								<td><?=  $amortissement['montant_annuel'] ?></td>
								<td><?=  $amortissement['date_debut'] ?></td>
								<td><?=  $amortissement['id_charge'] ?></td>
								<td>
									<a href="<?= base_url('edit-amortissement/' . $amortissement['id_amortissement_']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-amortissement/' . $amortissement['id_amortissement_']); ?>"><i class="far fa-trash-alt"></i></a>
								</td>
							</tr>
							<?php endforeach; ?>
						<?php endif; ?>
					</tbody>
				</table>
				<!-- Contenu de la page ici -->
				<?php echo $pager->links();?>
			</div>
		</div>
	</div>
	</section>
</main>
<?= $this->endSection('content') ?>
