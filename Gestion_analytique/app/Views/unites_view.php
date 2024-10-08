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
							<th>Id_unite</th>
							<th>Unite</th>
						</tr>
					</thead>
					<tbody>
						<?php if ($unites): ?>
							<?php foreach ($unites as $unite): ?>
							<tr>
								<td><?=  $unite['id_unite'] ?></td>
								<td><?=  $unite['unite'] ?></td>
								<td>
									<a href="<?= base_url('edit-unite/' . $unite['id_unite']); ?>"><i class="far fa-edit"></i></a>
								</td>
								<td>
									<a href="<?= base_url('delete-unite/' . $unite['id_unite']); ?>"><i class="far fa-trash-alt"></i></a>
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
