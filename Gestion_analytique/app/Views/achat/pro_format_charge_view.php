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
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_pf</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_fournisseur</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Id_charge</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantite</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_livraison</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date_commande</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Isvalid</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Valider</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Annuler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($pro_format_charge): ?>
                                        <?php foreach ($pro_format_charge as $pro_format_charge): ?>
                                        <tr>
                                            <td><?=  $pro_format_charge['id_pf'] ?></td>
                                            <td><?=  $pro_format_charge['id_fournisseur'] ?></td>
                                            <td><?=  $pro_format_charge['id_charge'] ?></td>
                                            <td><?=  $pro_format_charge['quantite'] ?></td>
                                            <td><?=  $pro_format_charge['date_livraison'] ?></td>
                                            <td><?=  $pro_format_charge['date_commande'] ?></td>
                                            <td><?=  $pro_format_charge['isvalid'] ?></td>
                                            <td>
                                                <a href="<?= base_url('valider_proformat_charge?id_pfc=' . $pro_format_charge['id_pf']) ?>" class="btn btn-success btn-xs">Valider</a>
                                            </td>
                                            <td>
                                                <button class="btn btn-danger btn-xs" onclick="confirmAnnulation(<?= $pro_format_charge['id_pf'] ?>)">Annuler</button>
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
                        </div>

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

<!-- Script pour afficher une alerte SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    function confirmAnnulation(id) {
        Swal.fire({
            title: 'Êtes-vous sûr ?',
            text: "Cette action est irréversible !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Oui, annuler',
            cancelButtonText: 'Non, annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('annuler_proformat_charge?id_pfc=') ?>" + id;
            }
        })
    }
</script>

<?= $this->endSection('content1') ?>
