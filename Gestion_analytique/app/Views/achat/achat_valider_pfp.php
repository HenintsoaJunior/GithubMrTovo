<!-- coded by alireza @myFrontCodes -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Faire une RDV</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="icon" href="<?= base_url('assets/img/logo.jpg') ?>">
    <style>
/* Centrer le formulaire */
.form-retour {
    display: flex;
    justify-content: center;  /* Centre horizontalement */
    align-items: center;      /* Centre verticalement */
    margin-top: 20px;         /* Ajoute un peu de marge en haut */
}

/* Style du bouton "Retour" */
.retour-btn {
    background-color: #1d2026; /* Couleur de fond verte */
    color: white;              /* Texte en blanc */
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.retour-btn:hover {
    background-color: #218838; /* Couleur plus foncée au survol */
}

    </style>
</head>

<body>
    <div class="body">
        <div class="all-container col-12">
            <!-- logo -->
            <div class="logo-container">
                <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="github-logo" class="logo">
            </div>
            <!-- header text -->
            <span class="text-white fs-4 fw-lighter login-text">Achat PFC Valider</span>
            
            <div class="signin-container rounded">
                <img src="<?= base_url('assets/img/rdv_success.png') ?>" alt="rdv logo" class="rdv">

                <form action="<?= base_url('/pro_format_produit-list') ?>" method="get" class="form-retour">
                    <input type="submit" value="Retour" class="retour-btn">
                </form>



                
            </div>
            <!-- create account -->
            
            <!-- links -->
            <div class="links-container">
                <a href="#">Terms</a>
                <a href="#">Privacy</a>
                <a href="#">Security</a>
                <a href="#" class="text-muted">Contact GitHub</a>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</html>
