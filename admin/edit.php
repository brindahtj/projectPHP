<!-- Contenu du tableau de bord -->
<?php
require_once '../init/init.php';
if (!userIsAdmin()) {
    header('Location:../index.php');
}

$regex = '#^[a-zA-Z0-9.*-]+$#';
$error = [];


if (!empty($_GET)) {
    $id = $_GET['id'];
    if ($_GET['action'] == 'edit') {

        $sql = "SELECT * FROM produit WHERE id_produit= :id_produit";
        $req = $pdo->prepare($sql);
        $req->bindParam(':id_produit', $id, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();

        if ($req->rowCount() == 0) {
            header('Location: index.php');
        } else {
            if (isset($_POST['submit'])) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $reference = inputCleaning('reference');
                    checkCharacter('reference');
                    preg_match($regex, $reference) ? "" : $error['regex'] = "The reference must have just alphanumeric characters";

                    $category = inputCleaning('category');
                    $title = inputCleaning('title');
                    $description = inputCleaning('description');
                    $color = inputCleaning('color');
                    $size = inputCleaning('size');
                    $public = inputCleaning('public');
                    $prix = inputCleaning('prix');
                    $stock = inputCleaning('stock');

                    $image = '';
                    if (!empty($_FILES['photo']['name'])) {
                        $image = $_FILES['photo']['name'];
                        $photo = time() . '-' . rand(1, 9999) . '-' . bin2hex(random_bytes(8)) . '-' . $image;
                        $ext = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                        $ext = strtolower($ext);
                        $tabExtension = ['jpg', 'png', 'jpeg', 'gif', 'svg', 'webp'];
                        if (in_array($ext, $tabExtension)) {
                            // je verifie que le fichier ne dépasse 8 Mo
                            if ($_FILES['photo']['size'] <= 8000000) {
                                move_uploaded_file($_FILES['photo']['tmp_name'], BASE . $photo);
                            } else {
                                $error['img'] = "photo must be smaller to 8Mo ";
                            }
                        } else {
                            $error['ext'] =  "the extension is not valid.";
                        }
                    }
                    if (count($error) == 0) {
                        if (empty($photo)) {
                            $photo = $result['photo'];
                        }
                        $sql2 = "UPDATE `produit` SET `reference`=:reference,`category`=:category,`title`=:title,`description`=:description,`color`=:color,`size`=:size,`public`=:public,`photo`=:photo,`prix`=:prix,`stock`=:stock WHERE id_produit = :id_produit";
                        $req = $pdo->prepare($sql2);
                        $req->bindParam(':reference', $reference, PDO::PARAM_STR);
                        $req->bindParam(':category', $category, PDO::PARAM_STR);
                        $req->bindParam(':title', $title, PDO::PARAM_STR);
                        $req->bindParam(':description', $description, PDO::PARAM_STR);
                        $req->bindParam(':color', $color, PDO::PARAM_STR);
                        $req->bindParam(':size', $size, PDO::PARAM_STR);
                        $req->bindParam(':public', $public, PDO::PARAM_STR);
                        $req->bindParam(':photo', $photo, PDO::PARAM_STR);
                        $req->bindParam(':prix', $prix, PDO::PARAM_INT);
                        $req->bindParam(':stock', $stock, PDO::PARAM_INT);
                        $req->bindParam(':id_produit', $_POST['id_produit'], PDO::PARAM_INT);
                        $result2 = $req->execute();
                        if ($result2) {
                            echo "The product have been modified successfully";
                        }
                    }
                }
            } elseif ($_GET['action'] == 'delete') {


                $sql3 = "SELECT * FROM produit WHERE id_produit= :id_produit";
                $req = $pdo->prepare($sql3);
                $req->bindParam(':id_produit', $id, PDO::PARAM_STR);
                $result3 = $req->execute();
                if ($req->rowCount() == 0) {
                    header('Location: index.php');
                } else {
                    $sql4 = "DELETE FROM `produit` WHERE id_produit=:id_produit";
                    $req = $pdo->prepare($sql4);
                    $req->bindParam(':id_produit', $id, PDO::PARAM_INT);
                    $result3 = $req->execute();
                    if ($result3) {
                        echo "The product have been deleted successfully";
                    }
                }
            }
        }
    }
}


?>
<?php
require_once 'partials/nav.php'
?>
<div class="content">
    <h2 class="text-center">Modifier un produit</h2>

    <div class="container">
        <!-- Formulaire d'ajout de produits -->
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id_produit" value="<?= $result['id_produit'] ?>">
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                <input type="text" name="reference" class="form-control" id="reference" placeholder="Référence du produit" value="<?= !empty($result['reference']) ? $result['reference'] : "" ?>">
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?><?= isset($error['regex']) ? $error['regex']  : "" ?></div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-tags"></i></span>
                <input type="text" name="category" class="form-control" id="categorie" placeholder="Catégorie du produit" value="<?= !empty($result['category']) ? $result['category'] : "" ?>">
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                <input type="text" name="title" class="form-control" id="titre" placeholder="Titre du produit" value="<?= !empty($result['title']) ? $result['title'] : "" ?>">
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>

            <div class="d-flex justify-content-between">
                <div class="input-group mb-3 mr-2">
                    <label for="couleur" class="input-group-text">Couleur</label>
                    <select name="color" class="form-control" id="couleur" value="">
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
                <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>


                <div class="input-group mb-3 mr-2">
                    <label for="taille" class="input-group-text">Taille</label>
                    <select name="size" class="form-control" id="taille" value="">
                        <option value="xs" <?php if (!empty($result['size']) && $result['size'] == "xs") echo 'selected' ?>>XS</option>
                        <option value="s" <?php if (!empty($result['size']) && $result['size'] == "s") echo 'selected' ?>>S</option>
                        <option value="m" <?php if (!empty($result['size']) && $result['size'] == "m") echo 'selected' ?>>M</option>
                        <option value="l" <?php if (!empty($result['size']) && $result['size'] == "l") echo 'selected' ?>>L</option>
                        <option value="xl" <?php if (!empty($result['size']) && $result['size'] == "xl") echo 'selected' ?>>XL</option>
                        <option value="xxl" <?php if (!empty($result['size']) && $result['size'] == "xxl") echo 'selected' ?>>XXL</option>
                    </select>
                </div>
                <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>


                <div class="input-group mb-3 ">
                    <label for="public" class="input-group-text">Public</label>
                    <select name="public" class="form-control" id="public" value="<?= !empty($public) ? $public : "" ?>">
                        <option value="homme" <?php if (!empty($result['public']) && $result['public'] == "homme") echo 'selected' ?>>Homme</option>
                        <option value="femme" <?php if (!empty($result['public']) && $result['public'] == "femme") echo 'selected' ?>>Femme</option>
                        <option value="unisexe" <?php if (!empty($result['public']) && $result['public'] == "unisexe") echo 'selected' ?>>Unisexe</option>
                        <option value="enfant" <?php if (!empty($result['public']) && $result['public'] == "enfant") echo 'selected' ?>>Enfant</option>
                    </select>
                </div>
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>


            <div class="d-flex justify-content-between">
                <div class="input-group mb-3 mr-2">
                    <span class="input-group-text"><i class="bi bi-currency-euro"></i></span>
                    <input type="number" name="prix" class="form-control" id="prix" placeholder="Prix du produit" value="<?= !empty($result['prix']) ? $result['prix'] : "" ?>">
                </div>
                <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>


                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-archive"></i></span>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock du produit" value="<?= !empty($result['stock']) ? $result['stock'] : "" ?>">
                </div>
                <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>

            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description du produit"><?= !empty($result['description']) ? $result['description'] : "" ?></textarea>
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>


            <div class="input-group mb-3">
                <input type="file" name="photo" class="form-control" id="photo">
                <span>
                    <img src="../public/assets/upload/<?= $result['photo'] ?>" alt="Chemise" width="100" class="img-fluid">
                </span>
            </div>
            <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?><?= isset($error['ext']) ? $error['ext']  : "" ?><?= isset($error['img']) ? $error['img']  : "" ?></div>


            <button type="submit" name="submit" class="btn btn-primary">Modifier le produit</button>


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
                <?php

                $query = $pdo->query("SELECT * FROM produit");
                $product = $query->fetchAll(PDO::FETCH_ASSOC);



                ?>
                <?php foreach ($product as $key => $data) : ?>

                    <tr>
                        <td><?= $data['reference'] ?></td>
                        <td><?= $data['category'] ?></td>
                        <td><?= $data['title'] ?></td>
                        <td><?= $data['prix'] . ' €' ?></td>
                        <td><?= $data['description'] ?></td>
                        <td><img src="../public/assets/upload/<?= $data['photo'] ?>" alt="Chemise" width="100" class="img-fluid"></td>
                        <td>
                            <a href="edit.php?action=edit&id=<?= $data['id_produit'] ?>" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="edit.php?action=delete&id=<?= $data['id_produit'] ?>" class="btn btn-danger btn-sm">
                                <i class="bi bi-trash3"></i>
                            </a>
                        </td>

                    </tr>
                <?php endforeach ?>

            </tbody>
        </table>

    </div>
</div>
<!-- Fin du contenu du tableau de bord -->
<?php require_once 'partials/footer.php' ?>