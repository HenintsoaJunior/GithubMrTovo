<?= $this->extend('layouts/userTemplate') ?>
<?= $this->section('content2') ?>
<link href="<?= base_url('assets/css/pdfcss.css') ?>" rel="stylesheet">
<div class="content-wrapper">
    <section class="content">
        
            <table style="background-color: #1f2937; color: white;"  width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
                    <tbody>
                        <tr>
                            <td class="w-full align-top">
                                <div class="flex justify-between items-center">
                                    <h1 class="text-2xl font-bold text-gray-800">Bon de Réception #<?= $bon_reception_details['numero_bon_reception'] ?></h1>
                                    
                                </div>
                            </td>
                            <td class="align-top">
                                <div class="text-sm">
                                    <table class="border-collapse border-spacing-0">
                                        <tbody>
                                            <tr>
                                                <td class="border-r pr-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">Date de Commande</p>
                                                        <p class="whitespace-nowrap font-bold text-gray-800 text-right">
                                                            <?= date('d/m/Y', strtotime($bon_reception_details['date_commande'])) ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="pl-4">
                                                    <div>
                                                        <p class="whitespace-nowrap text-slate-400 text-right">Date de Réception</p>
                                                        <p class="whitespace-nowrap font-bold text-gray-800 text-right">
                                                            <?= date('d/m/Y', strtotime($bon_reception_details['date_reception'])) ?>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>

            <!-- Reste du code inchangé... -->
            
            <!-- Informations Client et Statut -->
            <div width="11%" align="center" valign="top" style="color: #1f2937;" class="bg-slate-100 px-14 py-6 text-sm">
                <table class="w-full border-collapse border-spacing-0">
                    <tbody>
                        <tr>
                            <td class="w-1/2 align-top">
                                <div class="text-sm text-neutral-600">
                                    <p style="color: #1f2937;" class="font-bold text-lg mb-2">Informations Client</p>
                                    <p style="color: #1f2937;" class="font-bold"><?= $bon_reception_details['nom_client'] ?></p>
                                    <p style="color: #1f2937;">Statut: 
                                        <span class="font-semibold px-2 py-1 rounded" style="color: <?= $bon_reception_details['statut_bon_reception'] === 'Validé' ? 'green' : 'red' ?>">
                                            <?= $bon_reception_details['statut_bon_reception'] ?>
                                        </span>
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Détails du Produit -->
            <div class="px-14 py-10 text-sm text-neutral-700">
                <table class="w-full border-collapse border-spacing-0">
                    <thead>
                        <tr>
                            <td class="border-b-2 border-gray-800 pb-3 pl-3 font-bold text-gray-800">Produit</td>
                            <td class="border-b-2 border-gray-800 pb-3 pl-2 text-right font-bold text-gray-800">Prix Unitaire</td>
                            <td class="border-b-2 border-gray-800 pb-3 pl-2 text-center font-bold text-gray-800">Quantité</td>
                            <td class="border-b-2 border-gray-800 pb-3 pl-2 pr-3 text-right font-bold text-gray-800">Total</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border-b py-3 pl-3"><?= $bon_reception_details['nom_produit'] ?><br>
                                <span class="text-sm text-gray-500">Type: <?= $bon_reception_details['type_produit'] ?></span>
                            </td>
                            <td class="border-b py-3 pl-2 text-right"><?= number_format($bon_reception_details['prix_unitaire'], 2) ?> Ar</td>
                            <td class="border-b py-3 pl-2 text-center"><?= $bon_reception_details['quantite_produit'] ?> <?= $bon_reception_details['unite_produit'] ?></td>
                            <td class="border-b py-3 pl-2 pr-3 text-right"><?= number_format($bon_reception_details['total_prix'], 2) ?> Ar</td>
                        </tr>
                        <!-- Total -->
                        <tr>
                            <td colspan="4">
                                <table class="w-full border-collapse border-spacing-0">
                                    <tbody>
                                        <tr>
                                            <td class="w-full"></td>
                                            <td>
                                                <table class="border-collapse border-spacing-0">
                                                    <tbody>
                                                        <tr style="background-color: #1f2937;">
                                                            <td class="bg-gray-800 p-3">
                                                                <div class="whitespace-nowrap font-bold text-white">Total:</div>
                                                            </td>
                                                            <td class="bg-gray-800 p-3 text-right">
                                                                <div class="whitespace-nowrap font-bold text-white">
                                                                    <?= number_format($bon_reception_details['total_prix'], 2) ?> Ar
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <footer class="bg-slate-100 w-full text-neutral-600 text-center text-xs py-3 mt-10">                
                <p style="font-size: 15px;">
                    <a href="<?= base_url('facture_pdf?id_br=' . $bon_reception_details['numero_bon_reception']) ?>">
                        Exporter PDF
                    </a>
                </p>
            </footer>
        
    </section>
</div>

<?= $this->endSection('content2') ?>