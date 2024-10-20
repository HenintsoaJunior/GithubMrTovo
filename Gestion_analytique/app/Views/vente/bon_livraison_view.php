<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Bon de Livraison</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">														*
								<thead>
									<tr>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_bl</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_br</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_livraison</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Action</th>
									
									</tr>
								</thead>
							<tbody>
								<?php if ($bon_livraison): ?>
									<?php foreach ($bon_livraison as $bon_livraison): ?>
									<tr>
										<td>BL<?=  $bon_livraison['id_bl'] ?></td>
										<td>BR<?=  $bon_livraison['id_br'] ?></td>
										<td><?=  $bon_livraison['date_livraison'] ?></td>
										<td>
											<a href="<?= base_url('getBon_livraisonDetails?id_bl=' . $bon_livraison['id_bl']) ?>"  class="btn btn-success btn-xs">Details</a>
										</td>
									</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
							</table>
						</div> <!-- Fin du div selectnonee -->

                        <!-- Conteneur pour centrer la pagination -->
                        <div class="pagination-container text-center">
                            <?php echo $pager->links(); ?>
                        </div>

                    </div> <!-- Fin de la box-body -->
                </div> <!-- Fin de la box -->
            </div> <!-- Fin du row col-md-12 -->
        </div> <!-- Fin du row -->
    </section>
</div>
<?= $this->endSection('content1') ?>