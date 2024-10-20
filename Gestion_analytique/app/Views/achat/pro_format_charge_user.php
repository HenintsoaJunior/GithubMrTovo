<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Pro Format Charge</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
								<thead>
										
								<tr>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Fournisseur</th>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Charge</th>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_livraison</th>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_commande</th>
								<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Isvalid</th>
								    
							</tr>
						</thead>
						<tbody>
							<?php if ($pro_format_charge): ?>
								<?php foreach ($pro_format_charge as $pro_format_charge): ?>
								<tr>
									<td><?=  $pro_format_charge['fournisseur_nom'] ?></td>
									<td><?=  $pro_format_charge['charge_nom'] ?></td>
									<td><?=  $pro_format_charge['quantite_charge'] ?></td>
									<td><?=  $pro_format_charge['date_livraison_charge'] ?></td>
									<td><?=  $pro_format_charge['date_commande_charge'] ?></td>
									<td style="color: <?= $pro_format_charge['isvalid'] ? 'green' : 'red' ?>;">
										<?= $pro_format_charge['isvalid'] ?>
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
