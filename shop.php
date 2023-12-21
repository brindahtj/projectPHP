<?php require_once 'init/init.php' ?>
<?php
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     if (isset($_POST['submit'])) {
//         $formattednom = specialchars('nom');
//         $nom = "%$formattednom%";
//         $ordrePrix = $_POST['ordrePrix'];
//         $prixMin = specialchars('prixMin');
//         $prixMax = specialchars('prixMax');
//         $category = specialchars('category');
//         $size = specialchars('size');
//         $color = specialchars('color');
//         $public = specialchars('public');

//         // $sql = "SELECT * FROM produit WHERE title LIKE :nom  ORDER BY prix :ordrePrix  OR prix BETWEEN :prixMin AND :prixMax   OR category =:category OR size=:size OR color=:color OR public=:public";
//         $sql = "SELECT * FROM produit WHERE title LIKE :nom ";
//         $req = $pdo->prepare($sql);
//         $req->bindParam(':nom', $nom, PDO::PARAM_STR);
//         // $req->bindParam(':ordrePrix', $ordrePrix, PDO::PARAM_STR);
//         // $req->bindParam(':prixMin', $prixMin, PDO::PARAM_INT);
//         // $req->bindParam(':prixMax', $prixMax, PDO::PARAM_INT);
//         // $req->bindParam(':category', $category, PDO::PARAM_STR);
//         // $req->bindParam(':size', $size, PDO::PARAM_STR);
//         // $req->bindParam(':color', $color, PDO::PARAM_STR);
//         // $req->bindParam(':public', $public, PDO::PARAM_STR);
//         $req->execute();

//         $result = $req->fetchAll(PDO::FETCH_ASSOC);
//         var_dump($result);
//     } else {
//         $sql = "SELECT * FROM produit ";
//         $req = $pdo->query($sql);
//         $result = $req->fetchAll(PDO::FETCH_ASSOC);
//     }
// }
$sql = "SELECT * FROM produit ";
$req = $pdo->query($sql);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>
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
                    <form method="POST">

                        <!-- Filtre par ordre de prix -->
                        <div class="mb-3">
                            <select class="form-select" id="ordrePrix" name="ordrePrix">
                                <option value="ASC">Prix Croissant</option>
                                <option value="DESC">Prix Décroissant</option>
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
                            <select class="form-select" id="categorie" name="category">
                                <option value="">Selectionner la categorie</option>
                                <option value="Vêtements">Vêtements</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Goodies">Goodies</option>
                            </select>
                        </div>
                        <!-- Filtre par taille -->
                        <div class="mb-3">
                            <select class="form-select" id="size" name="size">
                                <option value="">Selectionner la taille</option>
                                <option value="xs" <?php if (!empty($size) && $size == "xs") echo 'selected' ?>>XS</option>
                                <option value="s" <?php if (!empty($size) && $size == "s") echo 'selected' ?>>S</option>
                                <option value="m" <?php if (!empty($size) && $size == "m") echo 'selected' ?>>M</option>
                                <option value="l" <?php if (!empty($size) && $size == "l") echo 'selected' ?>>L</option>
                                <option value="xl" <?php if (!empty($size) && $size == "xl") echo 'selected' ?>>XL</option>
                                <option value="xxl" <?php if (!empty($size) && $size == "xxl") echo 'selected' ?>>XXL</option>
                            </select>
                        </div>
                        <!-- Filtre par public -->
                        <div class="mb-3">
                            <select class="form-select" id="public" name="public">
                                <option value="">Selectionner le public</option>
                                <option value="homme" <?php if (!empty($public) && $public == "homme") echo 'selected' ?>>Homme</option>
                                <option value="femme" <?php if (!empty($public) && $public == "femme") echo 'selected' ?>>Femme</option>
                                <option value="unisexe" <?php if (!empty($public) && $public == "unisexe") echo 'selected' ?>>Unisexe</option>
                                <option value="enfant" <?php if (!empty($public) && $public == "rouge") echo 'selected' ?>>Enfant</option>
                            </select>
                        </div>
                        <!-- Filtre par couleur -->
                        <div class="mb-3">
                            <select class="form-select" id="couleur" name="color">
                                <option value="">Selectionner la couleur</option>
                                <option value="rouge" <?php if (!empty($color) && $color == "rouge") echo 'selected' ?>>Rouge</option>
                                <option value="bleu" <?php if (!empty($color) && $color == "bleu") echo 'selected' ?>>Bleu</option>
                                <option value="vert" <?php if (!empty($color) && $color == "vert") echo 'selected' ?>>Vert</option>
                                <option value="jaune" <?php if (!empty($color) && $color == "jaune") echo 'selected' ?>>Jaune</option>
                                <option value="noir" <?php if (!empty($color) && $color == "noir") echo 'selected' ?>>Noir</option>
                                <option value="blanc" <?php if (!empty($color) && $color == "blanc") echo 'selected' ?>>Blanc</option>
                                <option value="gris" <?php if (!empty($color) && $color == "gris") echo 'selected' ?>>Gris</option>
                                <option value="rose" <?php if (!empty($color) && $color == "rose") echo 'selected' ?>>Rose</option>
                                <option value="multicolore" <?php if (!empty($color) && $color == "multicolore") echo 'selected' ?>>Multicolore</option>
                                <option value="autre" <?php if (!empty($color) && $color == "autre") echo 'selected' ?>>Autre</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" href="shop.php?color=">Filtrer</button>
                    </form>
                </div>
            </div>
        </aside>

        <section class="col-lg-9 row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($result as $key => $product) : ?>
                <?php include 'partials/card.php' ?>
            <?php endforeach ?>
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