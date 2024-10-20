<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="row col-md-12">
                <div class="box box-solid">
                    <div class="box-header">
                        <h3 class="box-title" align="center">Compta Sous Ecriture</h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div id="selectnonee">
                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">id_Pf</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">fournisseur_nom</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">id_charge</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">quantite</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">date_operation</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">description</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">debit</th>
                                        <th width="11%" align="center" valign="top" style="background-color:#103a8e; color:white">credit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($compta_sous_ecriture): ?>
                                        <?php foreach ($compta_sous_ecriture as $entry): // Correction de la variable ?>
                                        <tr>
                                            <td><?=  $entry['id_pf'] ?></td>
                                            <td><?=  $entry['fournisseur_nom'] ?></td>
                                            <td><?=  $entry['id_charge'] ?></td>
                                            <td><?=  $entry['quantite'] ?></td>
                                            <td><?=  $entry['date_operation'] ?></td>
                                            <td><?=  $entry['description'] ?></td>
                                            <td><?=  $entry['debit'] ?></td>
                                            <td><?=  $entry['credit'] ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="8" align="center">Aucune donnée disponible</td>
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
<?= $this->endSection() ?> <!-- Correction de la méthode endSection -->
