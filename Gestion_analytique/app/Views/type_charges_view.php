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
							<th>Id_type_charge</th>
							<th>Charge</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($type_charges): ?>
							<?php foreach ($type_charges as $type_charge): ?>
							<tr>
								<td><?=  $type_charge['id_type_charge'] ?></td>
								<td><?=  $type_charge['charge'] ?></td>
								<td>
									<a href="<?= base_url('edit-type_charge/' . $type_charge['id_type_charge']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-type_charge/' . $type_charge['id_type_charge']); ?>"><i class="far fa-trash-alt"></i></a>
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
