<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
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
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_stock</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_produit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Debit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Credit</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_stock</th>
										<th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Update</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Delete</th>
                                        
									</tr>
								</thead>
								<tbody>
									<?php if ($stock): ?>
										<?php foreach ($stock as $stock): ?>
										<tr>
											<td><?=  $stock['id_stock'] ?></td>
											<td><?=  $stock['id_produit'] ?></td>
											<td><?=  $stock['debit'] ?></td>
											<td><?=  $stock['credit'] ?></td>
											<td><?=  $stock['date_stock'] ?></td>
											<td>
												<a style="color: green;" href="<?= base_url('edit-stock/' . $stock['id_stock']); ?>"><i class="fa fa-edit"></i></a>
											</td>
											<td>
												<a style="color: red;" href="<?= base_url('delete-stock/' . $stock['id_stock']); ?>"><i class="fa fa-trash"></i></a>
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
