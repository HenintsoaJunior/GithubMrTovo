<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Bon de Sortie</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">														
								<thead>
									<tr>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_bs</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_Produit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_sortie</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Action</th>
										
									</tr>
								</thead>
								<tbody>
									<?php if ($bon_sortie): ?>
										<?php foreach ($bon_sortie as $bon_sortie): ?>
										<tr>
											<td>BR<?=  $bon_sortie['id_bs'] ?></td>
											<td>PR<?=  $bon_sortie['id_produit'] ?></td>
											<td><?=  $bon_sortie['quantite'] ?></td>
											<td><?=  $bon_sortie['date_sortie'] ?></td>
											<td>
                                                <a href="<?= base_url('getBon_sortieDetails?id_bs=' . $bon_sortie['id_bs']) ?>"  class="btn btn-success btn-xs">Details</a>
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
