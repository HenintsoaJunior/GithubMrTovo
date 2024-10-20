<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de Réception PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            text-align: center;
            color: #1f2937;
        }
        .reception-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .reception-header {
            border-bottom: 2px solid #1f2937;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .reception-header h1 {
            margin: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .status {
            padding: 5px 10px;
            border-radius: 4px;
            display: inline-block;
        }
        .status-valid {
            color: green;
        }
        .status-invalid {
            color: red;
        }
        .total-row {
            background-color: #1f2937;
            color: white;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            font-size: 0.9em;
            color: #777;
            margin-top: 20px;
            border-top: 1px solid #ddd;
            padding-top: 20px;
        }
    </style>
</head>
<body>
    <div class="reception-container">
        <div class="reception-header">
            <h1>Bon de Réception #<?= $bon_reception_details['numero_bon_reception'] ?></h1>
        </div>

        <!-- Informations Générales -->
        <table>
            <tr>
                <th>Date de Commande</th>
                <td><?= date('d/m/Y', strtotime($bon_reception_details['date_commande'])) ?></td>
                <th>Date de Réception</th>
                <td><?= date('d/m/Y', strtotime($bon_reception_details['date_reception'])) ?></td>
            </tr>
            <tr>
                <th>Client</th>
                <td><?= $bon_reception_details['nom_client'] ?></td>
                <th>Statut</th>
                <td>
                    <span class="status <?= $bon_reception_details['statut_bon_reception'] === 'Validé' ? 'status-valid' : 'status-invalid' ?>">
                        <?= $bon_reception_details['statut_bon_reception'] ?>
                    </span>
                </td>
            </tr>
        </table>

        <!-- Détails du Produit -->
        <h2>Détails du Produit</h2>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Type</th>
                    <th>Prix Unitaire</th>
                    <th>Quantité</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $bon_reception_details['nom_produit'] ?></td>
                    <td><?= $bon_reception_details['type_produit'] ?></td>
                    <td style="text-align: right"><?= number_format($bon_reception_details['prix_unitaire'], 2) ?> Ar</td>
                    <td style="text-align: center"><?= $bon_reception_details['quantite_produit'] ?> <?= $bon_reception_details['unite_produit'] ?></td>
                    <td style="text-align: right"><?= number_format($bon_reception_details['total_prix'], 2) ?> Ar</td>
                </tr>
                <tr class="total-row">
                    <td colspan="4" style="text-align: right">Total:</td>
                    <td style="text-align: right"><?= number_format($bon_reception_details['total_prix'], 2) ?> Ar</td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            Document généré le <?= date('d/m/Y à H:i') ?><br>
            Merci pour votre confiance. Pour toute question, veuillez nous contacter.
        </div>
    </div>
</body>
</html>