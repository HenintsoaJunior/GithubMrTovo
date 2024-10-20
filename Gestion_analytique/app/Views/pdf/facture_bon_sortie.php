<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de Sortie PDF</title>
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
        .sortie-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .sortie-header {
            border-bottom: 2px solid #1f2937;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .sortie-header h1 {
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
    <div class="sortie-container">
        <div class="sortie-header">
            <h1>Bon de Sortie #<?= $bon_sortie_details['id_bon_sortie'] ?></h1>
        </div>

        <!-- Informations Générales -->
        <table>
            <tr>
                <th>Date de Sortie en Stock</th>
                <td><?= date('d/m/Y', strtotime($bon_sortie_details['date_sortie'])) ?></td>
            </tr>
            
        </table>

        <!-- Détails du Produit -->
        <h2>Détails du Produit</h2>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité Sortie</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $bon_sortie_details['produit'] ?></td>
                    <td style="text-align: center"><?= $bon_sortie_details['quantite_sortie'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            Document généré le <?= date('d/m/Y à H:i') ?><br>
            Bon de sortie - Merci de votre confiance
        </div>
    </div>
</body>
</html>