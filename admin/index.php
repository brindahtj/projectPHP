<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <title>Admin Dashboard</title>
    <style>
        body {
            padding-top: 56px;
            /* Pour compenser la hauteur de la barre de navigation fixe */
        }

        .sidebar {
            position: fixed;
            top: 56px;
            bottom: 0;
            left: 0;
            z-index: 1000;
            padding: 20px;
            background-color: #040519;
            border-right: 1px solid #dee2e6;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .custom-link {
            color: #e7eaf9;
            font-weight: bold;
        }

        .custom-link:hover {
            background-color: #e9ecef;
        }

        .custom-bg {
            background-color: #040519 !important;
        }
    </style>
</head>

<body>
    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top custom-bg">
        <a class="navbar-brand" href="#">Admin Dashboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </nav>
    <!-- Barre latérale -->
    <div class="sidebar">
        <!-- Ajoutez vos liens de menu avec des icônes ici -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link custom-link" href="index.php">
                    <i class="bi bi-speedometer2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link" href="produit.php">
                    <i class="bi bi-shop"></i> Produits
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link" href="#">
                    <i class="bi bi-person"></i> Clients
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link" href="#">
                    <i class="bi bi-box-seam"></i> Commandes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link" href="../index.php">
                    <i class="bi bi-house"></i> Home
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link custom-link" href="#">
                    <i class="bi bi-box-arrow-left"></i> Logout
                </a>
            </li>

        </ul>
    </div>
    <!-- Fin de la barre latérale -->



    <!-- Contenu du tableau de bord -->
    <div class="content">
        <h2>Dashboard Content</h2>

    </div>
    <!-- Fin du contenu du tableau de bord -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>