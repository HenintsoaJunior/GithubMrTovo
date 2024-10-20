<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<style>
    /* Styles pour le thème sombre du modal */
.modal-content {
    background-color: #1e1e1e; /* Couleur de fond du modal */
    color: #ffffff; /* Couleur du texte dans le modal */
}

.modal-header {
    background-color: #2b2b2b; /* Couleur de fond de l'en-tête du modal */
    color: #ffffff; /* Couleur du texte de l'en-tête */
    border-bottom: 1px solid #444; /* Bordure inférieure de l'en-tête du modal */
}

.modal-footer {
    background-color: #2b2b2b; /* Couleur de fond du pied de page du modal */
    border-top: 1px solid #444; /* Bordure supérieure du pied de page du modal */
}

.modal-body {
    background-color: #1e1e1e; /* Couleur de fond du corps du modal */
    color: #ffffff; /* Couleur du texte dans le corps du modal */
}

</style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <!-- Modal -->
                        <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="errorModalLabel">Erreur</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Quantité stock insuffisante. Vous devez faire une demande à l'administration.
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h3 class="box-title" align="center">Liste des Produits</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                        
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
                                
							<thead>
                                    <tr>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Client</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Produit</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Quantité</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date Commande</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Date Réception</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Validité</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Valider</th> <!-- Nouvelle colonne pour l'action -->
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">Annuler</th> <!-- Nouvelle colonne pour l'action -->
                                    
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($bon_reception): ?>
                                        <?php foreach ($bon_reception as $reception): ?>
                                        <tr>
                                            <td>CLI<?= $reception['id_client'] ?></td>
                                            <td>PR<?= $reception['id_produit'] ?></td>
                                            <td><?= $reception['quantite'] ?></td>
                                            <td><?= $reception['date_commande'] ?></td>
                                            <td><?= $reception['date_reception'] ?></td>
                                            <td><?= $reception['isvalid'] ?></td>
											
                                            <td>
                                                <a href="javascript:void(0)" onclick="confirmAction('valider', '<?= base_url('valider_bon_reception?id_br=' . $reception['id_br']) ?>')" class="btn btn-success btn-xs">Valider</a>
                                            </td>
                                            

                                            <td>
                                                <a href="javascript:void(0)" onclick="confirmAction('annuler', '<?= base_url('annuler_bon_reception?id_br=' . $reception['id_br']) ?>')" class="btn btn-danger btn-xs">Annuler</a>
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

<?php if ($errorStock != null): ?>
    <script>
        $(document).ready(function() {
            $('#errorModal').modal('show');
        });
    </script>
<?php endif; ?>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
