<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<main id="main" class="main">
    <section class="section profile">
        <div class="container d-flex align-items-center justify-content-center" style="width: 80vh;">
            <div class="row w-100">
                
                <div class="container mt-4">
                    <h1 class="mb-4">Formulaire de saisie de données</h1>

                    <!-- Formulaire de saisie de données -->
                    <form id="dataForm" action="<?= site_url('/submit-analytique-form') ?>" method="post">
                        <div class="row mb-3">
                            <?php if (session()->getFlashdata('error')): ?>
                            <div class="alert alert-danger">
                                <?= session()->getFlashdata('error') ?>
                            </div>
                        <?php endif; ?>

                            <div class="col">
                                <label for="charge">Rubrique</label>
                                <input
                                type="text"
                                class="form-control"
                                id="charge"
                                name="charge"
                                placeholder="Ex : ACHAT"
                                />
                            </div>
                            <div class="col">
                                <label for="id_groupe">Groupe</label>
                                <select class="form-control" id="id_groupe" name="id_groupe">
                                    <option value="">All</option>
                                    <?php foreach ($groupes as $groupe): ?>
                                    <option value="<?= $groupe['id_groupe']; ?>"><?= $groupe['nom_groupe']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col">
                                <label for="id_unite">Unité</label>
                                <select class="form-control" id="id_unite" name="id_unite">
                                    <option value="">All</option>
                                    <?php foreach ($unites as $unite): ?>
                                    <option value="<?= $unite['id_unite']; ?>"><?= $unite['unite']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="id_nature_charge">Nature Charge</label>
                                <select class="form-control" id="id_nature_charge" name="id_nature_charge">
                                    <option value="">All</option>
                                    <?php foreach ($nature_charges as $nature_charge): ?>
                                    <option value="<?= $nature_charge['id_nature_charge']; ?>"><?= $nature_charge['nature']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col">
                                <label for="id_type_charge">Type Charge</label>
                                <?php foreach ($type_charges as $type_charge): ?>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="type_charge_<?= $type_charge['id_type_charge']; ?>" name="id_type_charge" value="<?= $type_charge['id_type_charge']; ?>">
                                        <label class="form-check-label" for="type_charge_<?= $type_charge['id_type_charge']; ?>">
                                            <?= $type_charge['charge']; ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="row mb-3" id="centreSection">
                            <div class="col">
                                <label for="id_centre">Centre</label><br>
                                <?php foreach ($centres as $centre): ?>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input centre-checkbox" type="checkbox" id="centre_<?= $centre['id_centre']; ?>" name="centres[]" value="<?= $centre['id_centre']; ?>" data-centre-name="<?= $centre['nom']; ?>">
                                    <label class="form-check-label" for="centre_<?= $centre['id_centre']; ?>">
                                        <?= $centre['nom']; ?>
                                    </label>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="montants">Montant</label>
                                <input type="number" class="form-control" id="montants" name="montants"/>
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <div class="col">
                                <div id="pourcentageInputs" class="row mb-3"></div>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <label for="date_debut" class="form-label">Date Debut</label>
                                <input
                                type="date"
                                class="form-control"
                                id="date_debut"
                                name="date_debut"
                                />
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col">
                                <label for="date_fin" class="form-label">Date Fin</label>
                                <input
                                type="date"
                                class="form-control"
                                id="date_fin"
                                name="date_fin"
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const centreSection = document.getElementById('centreSection');
        const pourcentageInputsContainer = document.getElementById('pourcentageInputs');
        const typeChargeRadios = document.querySelectorAll('input[name="id_type_charge"]');

        typeChargeRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                const isIncorporable = this.value === '<?= $type_charges[0]['id_type_charge']; ?>'; // Remplacez par l'ID réel pour Type charge incorporable
                pourcentageInputsContainer.innerHTML = ''; // Réinitialiser les montants

                if (isIncorporable) {
                    centreSection.style.display = 'none';
                    pourcentageInputsContainer.insertAdjacentHTML('beforeend', createpourcentageInputsimple()); // Ajouter une entrée de montant par défaut
                } else {
                    centreSection.style.display = 'block';
                }
            });
        });

        const centreCheckboxes = document.querySelectorAll('.centre-checkbox');

        function createpourcentageInputsimple() {
            return `
                <div class="col-12 pourcentage-input">
                    <label class="form-label">Pourcentage</label>
                    <input type="number" class="form-control" name="pourcentages[]">
                </div>
            `;
        }

        function createMontantInput(id, centreName) {
            return `
                <div class="col-12 pourcentage-input-${id}">
                    <label for="pourcentage_${id}" class="form-label">Pourcentage pour ${centreName}</label>
                    <input type="number" class="form-control" id="pourcentage_${id}" name="pourcentages[${id}]">
                </div>
            `;
        }

        centreCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const centreName = this.getAttribute('data-centre-name');
                const centreId = this.value;

                if (this.checked) {
                    pourcentageInputsContainer.insertAdjacentHTML('beforeend', createMontantInput(centreId, centreName));
                } else {
                    const inputToRemove = document.querySelector(`.montant-input-${centreId}`);
                    if (inputToRemove) {
                        inputToRemove.remove();
                    }
                }
            });
        });
    });
</script>


<?= $this->endSection('content') ?>
