<?php require_once 'init/init.php' ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST['ajout']);
    $id = $_POST['id_produit'];
    $sql = "SELECT * FROM produit  WHERE id_produit=:id";
    $req = $pdo->prepare($sql);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $product = $req->fetch(PDO::FETCH_ASSOC);
}
?>

<?php require_once 'partials/header.php' ?>

<!-- Tableau des produits -->
<h2 class="text-center mt-5">Liste des produits</h2>
<table class="table table-responsive table-striped table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>Titre</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Montant total</th>
        </tr>
    </thead>
    <tbody>
        <?php

        var_dump($id);
        var_dump($_POST['quantity']);
        var_dump($product['prix']);
        ajoutProduit($id, $_POST['quantity'], $product['prix']);
        ?>

        <tr>
            <td><?= $product['title'] ?></td>
            <td><?= $product['category'] ?></td>
            <td><?= $product['prix'] . ' €' ?></td>
            <td><?= montantTotal() ?></td>
            <td>
                <a href="panier.php" class="btn btn-warning btn-sm">
                    <i class="bi bi-pencil-square"></i>
                </a>
                <a href="panier.php" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash3"></i>
                </a>
            </td>

        </tr>

        <a href="edit.php?action=delete" class="btn btn-danger btn-sm">
            <i class="bi bi-trash3"></i> Vider le panier
        </a>

    </tbody>
</table>
<?php require_once 'partials/footer.php' ?>