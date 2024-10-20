<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Bon de Livraison PDF</title>
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
        .livraison-container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .livraison-header {
            border-bottom: 2px solid #1f2937;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .livraison-header h1 {
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
    <div class="livraison-container">
        <div class="livraison-header">
            <h1>Bon de Livraison #<?= $bon_livraison_details['id_bon_livraison'] ?></h1>
        </div>

        <!-- Informations Générales -->
        <table>
            <tr>
                <th>Date de Livraison</th>
                <td><?= date('d/m/Y', strtotime($bon_livraison_details['date_livraison'])) ?></td>
            </tr>
            <tr>
                <th>Client</th>
                <td><?= $bon_livraison_details['nom_client'] ?></td>
            </tr>
        </table>

        <!-- Détails du Produit -->
        <h2>Détails du Produit</h2>
        <table>
            <thead>
                <tr>
                    <th>Produit</th>
                    <th>Quantité Livrée</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $bon_livraison_details['produit'] ?></td>
                    <td style="text-align: center"><?= $bon_livraison_details['quantite_livree'] ?></td>
                </tr>
            </tbody>
        </table>

        <div class="footer">
            Document généré le <?= date('d/m/Y à H:i') ?><br>
            Bon de livraison - Merci de votre confiance
        </div>
    </div>
</body>
</html>