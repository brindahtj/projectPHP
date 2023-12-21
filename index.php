<?php require_once 'init/init.php' ?>
<?php
$sql = "SELECT * FROM produit ORDER BY id_produit DESC LIMIT 6";
$req = $pdo->query($sql);
$result = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<?php require_once 'partials/header.php' ?>

<div class="container">
    <!-- Hero Section -->
    <div class="row">
        <div class="container col-xxl-8 px-4">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6">

                    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">

                                <img src="./public/assets/upload/shop/4896649.jpg" class="d-block mx-lg-auto img-fluid carousel-img" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                            </div>
                            <div class="carousel-item">

                                <img src="./public/assets/upload/shop/9836.jpg" class="d-block mx-lg-auto img-fluid carousel-img" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="./public/assets/upload/shop/heroes3.svg" class="d-block mx-lg-auto img-fluid carousel-img" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>


                </div>
                <div class="col-lg-6">
                    <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3">
                        Bienvenue sur la boutique PHP
                    </h2>
                    <p class="lead">
                        Ceci est un projet de boutique en ligne réalisé en PHP procédural par KONEXIO 10 afin de valider notre module sur les bases de PHP.
                        Cet projet constitue notre premier projet en PHP et ne met pas en avant toutes les notions de PHP.C'est un projet qui nous a permis de nous familiariser avec le langage PHP.
                    </p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <button type="button" class="btn btn-primary btn-lg px-4 me-md-2">Découvrir nos produits</button>
                        <button type="button" class="btn btn-outline-secondary btn-lg px-4">Nos Catégories</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Fin Hero Section -->



    <!-- Produits Section -->

    <div class="row">
        <div class="col-md-12">
            <h2 class="display-5 fw-bold text-body-emphasis lh-1 mb-3 text-center">
                Nos derniers produits
            </h2>
        </div>

        <main>

            <div class="album py-5 bg-body-tertiary">
                <div class="container">

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                        <?php foreach ($result as $key => $product) : ?>
                            <?php include 'partials/card.php' ?>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>

        </main>
    </div>

    <!-- Fin Produits Section -->
</div>



<?php require_once 'partials/footer.php' ?>