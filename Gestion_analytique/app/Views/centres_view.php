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
							<th>Id_centre</th>
							<th>Nom</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($centres): ?>
							<?php foreach ($centres as $centre): ?>
							<tr>
								<td><?=  $centre['id_centre'] ?></td>
								<td><?=  $centre['nom'] ?></td>
								<td>
									<a href="<?= base_url('edit-centre/' . $centre['id_centre']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-centre/' . $centre['id_centre']); ?>"><i class="far fa-trash-alt"></i></a>
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
