<?php require_once 'partials/nav.php' ?>


<!-- Contenu du tableau de bord -->
<div class="content">
    <h2 class="text-center">Gestion des produits</h2>

    <div class="container">
        <!-- Formulaire d'ajout de produits -->
        <form>
            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-upc-scan"></i></span>
                <input type="text" name="reference" class="form-control" id="reference" placeholder="Référence du produit">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-tags"></i></span>
                <input type="text" name="category" class="form-control" id="categorie" placeholder="Catégorie du produit">
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                <input type="text" name="title" class="form-control" id="titre" placeholder="Titre du produit">
            </div>

            <div class="d-flex justify-content-between">
                <div class="input-group mb-3 mr-2">
                    <label for="couleur" class="input-group-text">Couleur</label>
                    <select name="color" class="form-control" id="couleur">
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
                    <select name="size" class="form-control" id="taille">
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
                    <select name="public" class="form-control" id="public">
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
                    <input type="number" name="prix" class="form-control" id="prix" placeholder="Prix du produit">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text"><i class="bi bi-archive"></i></span>
                    <input type="number" name="stock" class="form-control" id="stock" placeholder="Stock du produit">
                </div>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text"><i class="bi bi-file-earmark-text"></i></span>
                <textarea name="description" class="form-control" id="description" rows="3" placeholder="Description du produit"></textarea>
            </div>

            <div class="input-group mb-3">
                <input type="file " name="photo" class="form-control" id="photo">
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
<?php require_once 'partials/footer.php' ?>