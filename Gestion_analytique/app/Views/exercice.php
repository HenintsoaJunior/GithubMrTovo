<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <section class="section profile">
        <div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
            <div class="row w-100">
                
                <div class="container mt-4">
                    <h1 class="mb-4">Formulaire de saisie de données</h1>

                    <!-- Formulaire de saisie de données -->
                    <form id="dataForm" action="<?= site_url('/exercice') ?>" method="post">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="date_fin" class="form-label">Exercice</label>
                                <input
                                type="number"
                                class="form-control"
                                id="annee"
                                name="annee"
                                />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>



<?= $this->endSection('content') ?>
