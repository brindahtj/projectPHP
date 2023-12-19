<?php require_once 'init/init.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/assets/css/style.css">
    <title>Projet Boutique PHP</title>
</head>


<body>

    <div class="container-fluid">
        <!-- Header -->
        <header class="p-3 mb-3 border-bottom shadow-lg">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <a href="index.php" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
                        <img src="./public/assets/upload/logo/logo.png" alt="" width="40" height="32" class="me-2">
                    </a>

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="index.php" class="nav-link px-2 link-dark">Accueil</a></li>
                        <li><a href="shop.php" class="nav-link px-2 link-body-emphasis">Boutique</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis">Catégories</a></li>
                        <li><a href="#" class="nav-link px-2 link-body-emphasis">Contact</a></li>
                    </ul>

                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Recherchez un produit" aria-label="Search">
                    </form>

                    <div class="d-flex align-items-center me-lg-3">
                        <?php if (!userConnected()) : ?>

                            <a href="register.php" class="nav-link px-2 link-body-emphasis position-relative me-2">
                                <i class="bi bi-person-lines-fill fs-4"></i>
                            </a>
                            <a href="login.php" class="nav-link px-2 link-body-emphasis position-relative me-2">
                                <i class="bi bi-box-arrow-in-right fs-4"></i>
                            </a>
                        <?php endif ?>
                        <a href="#" class="nav-link px-2 link-body-emphasis position-relative me-2">
                            <i class="bi bi-cart3 fs-3"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                9+
                            </span>
                        </a>
                    </div>
                    <?php if (userConnected()) : ?>
                        <div class="dropdown text-end">
                            <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="https://randomuser.me/api/portraits/women/88.jpg" alt="user random" width="32" height="32" class="rounded-circle">
                            </a>
                            <ul class="dropdown-menu text-small">


                                <li><a class="dropdown-item" href="profil.php">Profil</a></li>
                                <li><a class="dropdown-item" href="#">Réglages</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <?php if (userIsAdmin()) : ?>

                                    <li><a class="dropdown-item" href="./admin/index.php">Backoffice</a></li>
                                    <li>
                                    <?php endif ?>

                                    <hr class="dropdown-divider">
                                    </li>


                                    <li><a class="dropdown-item" href="logout.php">
                                            <i class="bi bi-box-arrow-in-right fs-4">
                                            </i>
                                            Logout
                                        </a></li>
                                <?php endif ?>

                            </ul>
                        </div>
                </div>
            </div>
        </header>