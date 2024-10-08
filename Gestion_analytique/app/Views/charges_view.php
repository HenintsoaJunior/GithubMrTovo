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
							<th>Id_charge</th>
							<th>Charge</th>
							<th>Montant_total</th>
							<th>Id_exercice</th>
							<th>Id_groupe</th>
							<th>Id_unite</th>
							<th>Id_type_charge</th>
							<th>Id_nature_charge</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($charges): ?>
							<?php foreach ($charges as $charge): ?>
							<tr>
								<td><?=  $charge['id_charge'] ?></td>
								<td><?=  $charge['charge'] ?></td>
								<td><?=  $charge['montant_total'] ?></td>
								<td><?=  $charge['id_exercice'] ?></td>
								<td><?=  $charge['id_groupe'] ?></td>
								<td><?=  $charge['id_unite'] ?></td>
								<td><?=  $charge['id_type_charge'] ?></td>
								<td><?=  $charge['id_nature_charge'] ?></td>
								<td>
									<a href="<?= base_url('edit-charge/' . $charge['id_charge']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-charge/' . $charge['id_charge']); ?>"><i class="far fa-trash-alt"></i></a>
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
