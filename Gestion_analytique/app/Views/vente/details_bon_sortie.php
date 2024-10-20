<?= $this->extend('layouts/adminTemplate') ?>
<?= $this->section('content1') ?>
<link href="<?= base_url('assets/css/pdfcss.css') ?>" rel="stylesheet">

<!-- Vue Bon de Sortie -->
<div class="content-wrapper">
    <section class="content">
        <table style="background-color: #1f2937; color: white;" width="100%" border="0" align="center" cellpadding="3" cellspacing="3" class="table table-hover table-bordered">
            <tbody>
                <tr>
                    <td class="w-full align-top">
                        <div class="flex justify-between items-center">
                            <h1 class="text-2xl font-bold text-gray-800">Bon de Sortie #<?= $bon_sortie_details['id_bon_sortie'] ?></h1>
                        </div>
                    </td>
                    <td class="align-top">
                        <div class="text-sm">
                            <table class="border-collapse border-spacing-0">
                                <tbody>
                                    <tr>
                                        <td class="pl-4">
                                            <div>
                                                <p class="whitespace-nowrap text-slate-400 text-right">Date de Sortie</p>
                                                <p class="whitespace-nowrap font-bold text-gray-800 text-right">
                                                    <?= date('d/m/Y', strtotime($bon_sortie_details['date_sortie'])) ?>
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

        <!-- Informations Client -->
        <div width="11%" align="center" valign="top" style="color: #1f2937;" class="bg-slate-100 px-14 py-6 text-sm">
            <table class="w-full border-collapse border-spacing-0">
                <tbody>
                    <tr>
                        <td class="w-1/2 align-top">
                            <div class="text-sm text-neutral-600">
                                <p style="color: #1f2937;" class="font-bold text-lg mb-2">Bon de Sortie en stock</p>
                            
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
                        <td class="border-b-2 border-gray-800 pb-3 pl-2 text-center font-bold text-gray-800">Quantité Sortie</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="border-b py-3 pl-3"><?= $bon_sortie_details['produit'] ?></td>
                        <td class="border-b py-3 pl-2 text-center"><?= $bon_sortie_details['quantite_sortie'] ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Footer -->
        <footer class="bg-slate-100 w-full text-neutral-600 text-center text-xs py-3 mt-10">
            <p style="font-size: 15px;">
                <a href="<?= base_url('facture_bon_sortie_pdf?id_bs=' . $bon_sortie_details['id_bon_sortie']) ?>">
                    Exporter PDF
                </a>
            </p>
        </footer>
    </section>
</div>

<?= $this->endSection('content1') ?>
