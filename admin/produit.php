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

        /* Masquer les flèches de l'input number */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            /* Firefox */
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
        <h2 class="text-center">Gestion des produits</h2>

        <div class="container">
            <!-- Formulaire d'ajout de produits -->
            <form>
                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                    <input type="text" class="form-control" id="reference" placeholder="Référence du produit">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-tags"></i></span>
                    <input type="text" class="form-control" id="categorie" placeholder="Catégorie du produit">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                    <input type="text" class="form-control" id="titre" placeholder="Titre du produit">
                </div>

                <div class="d-flex justify-content-between">
                    <div class="input-group mb-3 mr-2">
                        <label for="couleur" class="input-group-text">Couleur</label>
                        <select class="form-control" id="couleur">
                            <option value="rouge">Rouge</option>
                            <option value="bleu">Bleu</option>
                            <option value="vert">Vert</option>
                            <option value="jaune">Jaune</option>
                            <option value="noir">Noir</option>
                            <option value="blanc">Blanc</option>
                            <option value="gris">Gris</option>
                            <option value="rose">Rose</option>
                            <option value="multicolore">Multicolore</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="input-group mb-3 mr-2">
                        <label for="taille" class="input-group-text">Taille</label>
                        <select class="form-control" id="taille">
                            <option value="xs">XS</option>
                            <option value="s">S</option>
                            <option value="m">M</option>
                            <option value="l">L</option>
                            <option value="xl">XL</option>
                            <option value="xxl">XXL</option>
                        </select>
                    </div>

                    <div class="input-group mb-3 ">
                        <label for="public" class="input-group-text">Public</label>
                        <select class="form-control" id="public">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                            <option value="unisexe">Unisexe</option>
                            <option value="enfant">Enfant</option>
                        </select>
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <div class="input-group mb-3 mr-2">
                        <span class="input-group-text"><i class="bi bi-currency-euro"></i></span>
                        <input type="number" class="form-control" id="prix" placeholder="Prix du produit">
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="bi bi-archive"></i></span>
                        <input type="number" class="form-control" id="stock" placeholder="Stock du produit">
                    </div>
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                    <textarea class="form-control" id="description" rows="3" placeholder="Description du produit"></textarea>
                </div>

                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="photo">
                </div>

                <button type="submit" class="btn btn-primary">Ajouter le produit</button>
            </form>


            <!-- Tableau des produits -->
            <h2 class="text-center mt-5">Liste des produits</h2>
            <table class="table table-responsive table-striped table-hover mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Référence</th>
                        <th>Catégorie</th>
                        <th>Titre</th>
                        <th>Prix</th>
                        <th>Description</th>
                        <th>Photo</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>REF123</td>
                        <td>Vêtements</td>
                        <td>Chemise</td>
                        <td>25.99€</td>
                        <td>Chemise élégante pour hommes</td>
                        <td><img src="https://cdn.pixabay.com/photo/2023/06/30/07/49/ai-generated-8097822_1280.jpg" alt="Chemise" width="100" class="img-fluid"></td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>

                    </tr>
                    <tr>
                        <td>REF456</td>
                        <td>Vêtements</td>
                        <td>Pantalon</td>
                        <td>35.99€</td>
                        <td>Pantalon élégant pour hommes</td>
                        <td><img src="https://previews.123rf.com/images/kvladimirv/kvladimirv1809/kvladimirv180900129/108268690-jean-bleu-classique-pour-homme-et-jupe-en-denim-violet-sur-fond-bleu-la-vue-du-haut-v%C3%AAtements-pour.jpg" alt="Pantalon" width="100" class="img-fluid"></td>
                        <td>
                            <a href="#" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="#" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>
                </tbody>
            </table>

        </div>
    </div>
    <!-- Fin du contenu du tableau de bord -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>