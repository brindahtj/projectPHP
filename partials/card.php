<div class="col">
    <div class="card shadow-sm">
        <img src="../public/assets/upload/<?= $result['photo'] ?>" alt="<?= $result['title'] ?>" width="100" class="img-fluid">
        <div class="card-body">
            <span class="badge text-bg-warning"><?= $result['category'] ?></span>
            <p class="card-text"><?= $result['description'] ?></p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-success"><i class="bi bi-eye"></i> Voir ce produit</button>
                </div>
                <small class="text-body-dark fw-bold"><?= $result['prix'] ?> €</small>
            </div>
        </div>
    </div>
</div>