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
							<th>Id_nature_charge</th>
							<th>Nature</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($nature_charges): ?>
							<?php foreach ($nature_charges as $nature_charge): ?>
							<tr>
								<td><?=  $nature_charge['id_nature_charge'] ?></td>
								<td><?=  $nature_charge['nature'] ?></td>
								<td>
									<a href="<?= base_url('edit-nature_charge/' . $nature_charge['id_nature_charge']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-nature_charge/' . $nature_charge['id_nature_charge']); ?>"><i class="far fa-trash-alt"></i></a>
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
