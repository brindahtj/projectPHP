<?php
require_once '../init/init.php';
if (!userIsAdmin()) {
    header('Location: ../index.php');
}
?>

<?php require_once 'partials/nav.php' ?>



<!-- Contenu du tableau de bord -->
<div class="content">
    <h2>Dashboard Content</h2>

</div>
<!-- Fin du contenu du tableau de bord -->

<?php require_once 'partials/footer.php' ?>