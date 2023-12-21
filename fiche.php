<?php require_once 'init/init.php' ?>

<?php
if (isset($_GET)) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM produit  WHERE id_produit=:id";
    $req = $pdo->prepare($sql);
    $req->bindParam(':id', $id, PDO::PARAM_INT);
    $req->execute();
    $product = $req->fetch(PDO::FETCH_ASSOC);
}
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//     var_dump($_POST);
//     if (isset($_GET['quantity'])) {
//         $quantity = $_GET['quantity'];
//         var_dump($quantity);
//     }
// }
?>
<?php require_once 'partials/header.php' ?>


<div class="container px-4 px-lg-5 my-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
        <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="public/assets/upload/<?= $product['photo'] ?>" alt="<?= $product['title'] ?>s"></div>
        <div class="col-md-6">
            <div class="small mb-1">SKU: BST-498</div>
            <h1 class="display-5 fw-bolder"><?= $product['title'] ?></h1>
            <div class="fs-5 mb-5">
                <span><?= $product['prix'] ?> €</span>
            </div>
            <form class="py-5" method="POST" action="panier.php">
                <input type="hidden" name="id_produit" value="<?= $product['id_produit'] ?>">
                <select name="quantity" id="quantity">
                    <?php for ($i = 1; $i <= $product['stock']; $i++) : ?>
                        <option value="<?= $i ?>" <?php if (!empty($quantity) && $quantity == $i) echo 'selected' ?>><?= $i ?></option>
                    <?php endfor ?>
                </select>
                <p class="lead"><?= $product['description'] ?></p>
                <div class="d-flex">
                    <button class="btn btn-outline-dark flex-shrink-0" name="ajout" type="submit">
                        <i class="bi-cart-fill me-1"></i>
                        Add to cart
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>




<?php require_once 'partials/footer.php' ?>