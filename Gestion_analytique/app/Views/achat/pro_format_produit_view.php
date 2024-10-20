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
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_pf</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_fournisseur</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_produit</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_livraison</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_commande</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Isvalid</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Valider</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Annuler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pro_format_produit): ?>
                                        <?php foreach ($pro_format_produit as $pro_format_produit): ?>
                                        <tr>
                                            <td><?=  $pro_format_produit['id_pf'] ?></td>
                                            <td><?=  $pro_format_produit['id_fournisseur'] ?></td>
                                            <td><?=  $pro_format_produit['id_produit'] ?></td>
                                            <td><?=  $pro_format_produit['quantite'] ?></td>
                                            <td><?=  $pro_format_produit['date_livraison'] ?></td>
                                            <td><?=  $pro_format_produit['date_commande'] ?></td>
                                            <td><?=  $pro_format_produit['isvalid'] ?></td>
                                            <td>
                                                <button class="btn btn-success btn-xs" onclick="confirmAction('valider', '<?= base_url('valider_proformat_produit?id_pfp=' . $pro_format_produit['id_pf']) ?>')">Valider</button>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs" onclick="confirmAction('annuler', '<?= base_url('annuler_proformat_produit?id_pfp=' . $pro_format_produit['id_pf']) ?>')">Annuler</button>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="9" align="center">Aucun produit disponible.</td>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	
    function confirmAction(action, url) {
        let textMessage = (action === 'valider') ? 'Voulez-vous vraiment valider cette entrée ?' : 'Voulez-vous vraiment annuler cette entrée ?';
        let confirmButtonText = (action === 'valider') ? 'Valider' : 'Annuler';
        let iconType = (action === 'valider') ? 'success' : 'warning';

        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: textMessage,
            icon: iconType,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: confirmButtonText
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    }
</script>

<?= $this->endSection('content1') ?>
