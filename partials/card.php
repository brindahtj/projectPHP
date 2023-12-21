<div class="col">
    <div class="card shadow-sm">
        <img src="public/assets/upload/<?= $product['photo'] ?>" alt="<?= $product['title'] ?>" class="img-fluid">
        <div class="card-body">
            <span class="badge text-bg-warning"><?= $product['category'] ?></span>
            <p class="card-text"><?= $product['description'] ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a class="btn btn-sm btn-outline-success" href="fiche.php?id=<?= $product['id_produit'] ?> "><i class="bi bi-eye"></i> Voir ce produit</a>
                </div>
                <small class="text-body-dark fw-bold"><?= $product['prix'] ?> €</small>
            </div>
        </div>
    </div>
</div>