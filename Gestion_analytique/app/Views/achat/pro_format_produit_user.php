<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Pro Format Produit</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
								<thead>
									<tr>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Produit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_livraison</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_commande</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Status</th>
									
									</tr>
								</thead>
								<tbody>
									<?php if ($pro_format_produit): ?>
										<?php foreach ($pro_format_produit as $pro_format_produit): ?>
										<tr>
											<td><?=  $pro_format_produit['produit_nom'] ?></td>
											<td><?=  $pro_format_produit['quantite_produit'] ?></td>
											<td><?=  $pro_format_produit['date_livraison_produit'] ?></td>
											<td><?=  $pro_format_produit['date_commande_produit'] ?></td>
											<td style="color: <?= $pro_format_produit['status_produit'] == 'Valide' ? 'green' : 'red' ?>;">
												<?= $pro_format_produit['status_produit'] ?>
											</td>

										</tr>
										<?php endforeach; ?>
										<?php else: ?>
                                        <tr>
                                            <td colspan="7" align="center">Aucun produit disponible.</td>
                                        </tr>
									<?php endif; ?>

								</tbody>
								</table>
								</div> <!-- Fin du div selectnonee -->

                    </div> <!-- Fin de la box-body -->
                </div> <!-- Fin de la box -->
            </div> <!-- Fin du row col-md-12 -->
        </div> <!-- Fin du row -->
    </section>
</div>
<?= $this->endSection('content1') ?>
