<?= $this->extend('layouts/base') ?>
<?= $this->section('content') ?>
<style>
.table-container {
    width: 100%;
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;
    gap: 10px; /* Ajout d'espacement entre les tableaux */
}

/* Style des tableaux */
table {
    width: 200px;
    border-collapse: collapse;
    margin: 4px;
    background-color: white;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s ease-in-out;
}

table.rubrique {
    width: 180px;
}

table:hover {
    transform: scale(1.03);
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
    color: #333;
}

th {
    background-color: #f9f9f9;
    font-weight: bold;
    color: #555;
    text-transform: uppercase;
}

.total-cell {
    font-weight: bold;
    background-color: #f0f8ff; /* Couleur plus visible pour les totaux */
    color: black;
}

.total-general{
    font-weight: bold;
    background-color: #f0f8ff; /* Couleur plus visible pour les totaux */
    color: black;
}
</style>

<main id="main" class="main">
<div class="container">
<div class="row">
    <div class="table-container">
        <!-- Tableau de la rubrique -->
        <table class="rubrique">
            <tr>
                <th>Rubrique</th>
            </tr>
            <tr>
                <td class="total-cell">Total <?= number_format($total_rubrique['total_general'], 2) ?> Ar</td>
            </tr>
        </table>

        <!-- Boucle pour générer les tableaux de centres -->
        <?php foreach ($total_montant_analytique as $row): ?>
        <table>
            <tr>
                <th colspan="2"><?= htmlspecialchars($row['centre']) ?></th>
            </tr>
            <tr>
                <td>Fixe</td>
                <td>Variable</td>
            </tr>
            <tr>
                <td class="total-cell"><?= number_format($row['total_fixe'], 2) ?> Ar</td>
                <td class="total-cell"><?= number_format($row['total_variable'], 2) ?> Ar</td>
            </tr>
            <tr>
                <td colspan="2" class="total-cell">Total : <?= number_format($row['total_centre'], 2) ?> Ar</td>
            </tr>
        </table>
        <?php endforeach; ?>
        
        <!-- Tableau de la répartition -->
        <table>
            <thead>
                <tr>
                    <th>Repartition ADM/DIST</th>
                    <th>Cout Direct</th>
                    <th>Cle</th>
                    <th>ADM/DIST</th>
                    <th>Cout Total</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($repartition): ?>
                    <?php foreach ($repartition as $rep): ?>
                    <tr>
                        <td><?=  $rep['centre'] ?></td>
                        <td><?= number_format($rep['cout_direct'], 2) ?> Ar</td>
                        <td><?=  number_format($rep['cle'], 2) ?>%</td>
                        <td><?=  number_format($rep['adm_dist'], 2) ?> Ar</td>
                        <td><?=  number_format($rep['cout_total'], 2) ?> Ar</td>
                    </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                <tr>
                    <td class="total-general">Total Général</td>
                    <td class="total-general"><?= number_format($total_general_repartition['cout_direct'], 2) ?> Ar</td>
                    <td class="total-general"></td>
                    <td class="total-general"><?= number_format($total_general_repartition['adm_dist'], 2) ?> Ar</td>
                    <td class="total-general"><?= number_format($total_general_repartition['cout_total'], 2) ?> Ar</td>
                </tr>
            </tbody>
        </table>

        <!-- Graphique Seuil de Rentabilité -->
        <div style="width: 300px; height: 300px; margin: auto;">
            <canvas id="seuilRentabiliteChart"></canvas>
        </div>
    </div>
</div>
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Les données du serveur PHP
    const dataSeuilRentabilite = <?php echo json_encode($seuil_rentabilite); ?>;

    // Extraction des valeurs pour chaque catégorie
    const chiffresAffaires = dataSeuilRentabilite.map(sr => parseFloat(sr.chiffres_affaires));
    const coutVariable = dataSeuilRentabilite.map(sr => parseFloat(sr.cout_variable));
    const coutFixe = dataSeuilRentabilite.map(sr => parseFloat(sr.cout_fixe));
    const margeSurCoutVariable = dataSeuilRentabilite.map(sr => parseFloat(sr.marge_sur_cout_variable));
    const seuilRentabilite = dataSeuilRentabilite.map(sr => parseFloat(sr.seuil_rentabilite));

    // Les libellés que vous souhaitez afficher
    const labels = ['Chiffres d\'Affaires', 'Cout Variable', 'Cout Fixe', 'Marge sur Cout Variable', 'Seuil de Rentabilité'];

    // Vérifiez le contenu des données
    console.log('Chiffres Affaires:', chiffresAffaires);
    console.log('Cout Variable:', coutVariable);
    console.log('Cout Fixe:', coutFixe);
    console.log('Marge sur Cout Variable:', margeSurCoutVariable);
    console.log('Seuil de Rentabilité:', seuilRentabilite);

    // Les valeurs pour chaque section du doughnut
    const chartData = [
        chiffresAffaires.reduce((a, b) => a + b, 0), 
        coutVariable.reduce((a, b) => a + b, 0),
        coutFixe.reduce((a, b) => a + b, 0),
        margeSurCoutVariable.reduce((a, b) => a + b, 0),
        seuilRentabilite.reduce((a, b) => a + b, 0)
    ];

    // Vérifiez les données avant de les passer au graphique
    console.log('Données pour le graphique:', chartData);

    // Création du diagramme Doughnut
    const ctx = document.getElementById('seuilRentabiliteChart').getContext('2d');
    const seuilRentabiliteChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Seuil de Rentabilité',
                data: chartData,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ': ' + tooltipItem.raw.toLocaleString() + ' Ar';
                        }
                    }
                }
            }
        }
    });
</script>

<?= $this->endSection('content') ?>
