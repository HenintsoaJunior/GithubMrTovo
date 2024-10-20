<!-- coded by alireza @myFrontCodes -->
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign in to GitHub - GitHub</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('assets/css/login.css') ?>">
    <link rel="icon" href="<?= base_url('assets/img/logo.jpg') ?>">
</head>

<body>
    <div class="body">
        <div class="all-container col-12">
            <!-- logo -->
            <div class="logo-container">
            <img src="<?= base_url('assets/img/logo.jpg') ?>" alt="github-logo" class="logo">
            </div>
            <!-- header text -->
            <span class="text-white fs-4 fw-lighter login-text">FIRST PAGE</span>
            <!-- alert -->
            <!-- create account -->
            


            <div class="new-container">
                <a href="<?= base_url('/dashboardUser')?>">
                    <span  class="new-text">PAGE USER</span>
                </a>
            </div>


            <div class="new-container">
                <a href="<?= base_url('/dashboardCompta')?>">
                    <span  class="new-text">PAGE COMPTA</span>
                </a>
            </div>


            <div class="new-container">
                <a href="<?= base_url('/loginPage') ?>">
                    <span  class="new-text">PAGE ADMIN</span>
                </a>
                
            </div>
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

<script type="module" src="<?= base_url('ajax/autentification.js') ?>"></script>

</html>
