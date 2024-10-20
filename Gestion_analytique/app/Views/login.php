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
            <span class="text-white fs-4 fw-lighter login-text">Sign in to Admin</span>
            <!-- alert -->
            <div class="success-container" style="display: none;">
                <span id="success" style="margin-right: 20px;"></span>
                <img src="<?= base_url('assets/img/close.svg') ?>" alt="close-icon" class="alert-close">
            </div>

            <div class="alert-container" style="display: none;">
                <span id="error" style="margin-right: 20px;"></span>
                <img src="<?= base_url('assets/img/close.svg') ?>" alt="close-icon" class="alert-close">
            </div>
            
            <!-- sign in -->
            <div class="signin-container rounded">
                <form id="login"  method="">
                <div class="form-container">
                    <div class="mb-3">
                        <label for="nom" class="mb-2 form-label text-white inputTitle">Username</label>
                        <input type="text" class="form-control input" id="nom" name="nom">
                    </div>
                    <div class="mb-0">
                        <div class="d-flex justify-content-between">
                            <label for="password" class="mb-2 form-label text-white inputTitle">Password</label>
                        </div>
                        <input type="password" class="form-control input" id="password" name="password">
                    </div>
                </div>
                <input type="submit" value="sign in" class="btn btn-success signin-btn">
                </form>
            </div>
            <!-- create account -->
            <div class="new-container">
                <span  class="new-text">Pisciculture</span>
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
