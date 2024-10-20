<?= $this->extend('layouts/userTemplate') ?>
<?= $this->section('content2') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Liste des Produit</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">

											
								<thead>
									<tr>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Client</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Produit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_commande</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_reception</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Isvalid</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Action</th>
										
									</tr>
								</thead>
								<tbody>
									<?php if ($bon_reception): ?>
										<?php foreach ($bon_reception as $bon_reception): ?>
										<tr>
											<td>CLI<?=  $bon_reception['id_client'] ?></td>
											<td>PR<?=  $bon_reception['id_produit'] ?></td>
											<td><?=  $bon_reception['quantite'] ?></td>
											<td><?=  $bon_reception['date_commande'] ?></td>
											<td><?=  $bon_reception['date_reception'] ?></td>
											<td><?= $bon_reception['isvalid'] ?></td>
											
											<td>
                                                <a href="<?= base_url('getdetails_bon_reception?id_br=' . $bon_reception['id_br']) ?>"  class="btn btn-success btn-xs">Details</a>
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
<?= $this->endSection('content2') ?>
