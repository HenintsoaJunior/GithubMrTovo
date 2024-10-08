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
							<th>Id_liaison</th>
							<th>Id_centre</th>
							<th>Id_charge</th>
							<th>Montant</th>
							<th>Date_charge</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($liaison_charge_centre): ?>
							<?php foreach ($liaison_charge_centre as $liaison_charge_centre): ?>
							<tr>
								<td><?=  $liaison_charge_centre['id_liaison'] ?></td>
								<td><?=  $liaison_charge_centre['id_centre'] ?></td>
								<td><?=  $liaison_charge_centre['id_charge'] ?></td>
								<td><?=  $liaison_charge_centre['montant'] ?></td>
								<td><?=  $liaison_charge_centre['date_charge'] ?></td>
								<td>
									<a href="<?= base_url('edit-liaison_charge_centre/' . $liaison_charge_centre['id_liaison']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-liaison_charge_centre/' . $liaison_charge_centre['id_liaison']); ?>"><i class="far fa-trash-alt"></i></a>
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
