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
							<th>Id_groupe</th>
							<th>Nom_groupe</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($groupes): ?>
							<?php foreach ($groupes as $groupe): ?>
							<tr>
								<td><?=  $groupe['id_groupe'] ?></td>
								<td><?=  $groupe['nom_groupe'] ?></td>
								<td>
									<a href="<?= base_url('edit-groupe/' . $groupe['id_groupe']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-groupe/' . $groupe['id_groupe']); ?>"><i class="far fa-trash-alt"></i></a>
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
