<?php require_once 'partials/header.php' ?>


<main class="container mt-5">
    <div class="row">
        <aside class="col-lg-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">FILTRER PAR</h5>

                    <!-- Filtre par nom -->
                    <div class="mb-3">
                        <input type="text" class="form-control" id="nom" name="nom" placeholder="Recherchez un produit">
                    </div>

                    <!-- Filtre par prix -->
                    <form>

                        <!-- Filtre par ordre de prix -->
                        <div class="mb-3">
                            <select class="form-select" id="ordrePrix" name="ordrePrix">
                                <option value="croissant">Prix Croissant</option>
                                <option value="decroissant">Prix Décroissant</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <input type="number" class="form-control" id="prixMin" name="prixMin" placeholder="Prix Minimum">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="prixMax" name="prixMax" placeholder="Prix Maximum">
                        </div>

                        <!-- Filtre par catégorie -->
                        <div class="mb-3">
                            <select class="form-select" id="categorie" name="categorie">
                                <option value="categorie1">Catégorie 1</option>
                                <option value="categorie2">Catégorie 2</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </form>
                </div>
            </div>
        </aside>

        <section class="col-lg-9 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php include 'partials/card.php' ?>
        </section>

        <!-- Pagination -->
        <div class="mx-auto mt-5 mb-3">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Précédent</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>

                <li class="page-item">
                    <a class="page-link" href="#">Suivant</a>
                </li>
            </ul>
        </div>

        <!-- Fin Pagination -->
    </div>
</main>



<?php require_once 'partials/footer.php' ?>