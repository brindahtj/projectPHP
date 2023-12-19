<?php
require_once 'init/init.php';
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = inputCleaning('email');
    $password = inputCleaning('password');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email is not valid!";
    };

    $query = "SELECT * FROM membre WHERE email=:email";
    $data = $pdo->prepare($query);
    $data->bindValue(':email', $email, PDO::PARAM_STR);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);

    if (!$data->rowCount() > 0) {
        $error['emaildb'] =  "The email doesn't exists in the database";
    } else {

        if (password_verify($password, $result['mdp'])) {

            $_SESSION['user']['username'] = $result['pseudo'];
            $_SESSION['user']['firstname'] = $result['prenom'];
            $_SESSION['user']['lastname'] = $result['nom'];
            $_SESSION['user']['address'] = $result['adresse'];
            $_SESSION['user']['email'] = $result['email'];
            $_SESSION['user']['city'] = $result['ville'];
            $_SESSION['user']['code_postal'] = $result['code_postal'];
            $_SESSION['user']['statut'] = $result['statut'];


            header('Location: profil.php');
        } else {
            $error['password'] = "The password is not identical";
        }
    }

    if (userConnected()) {
        header('Location:profil.php');
        exit();
    }
}





?>
<?php require_once 'partials/header.php' ?>
<!-- Fin Header -->

<div class="container">

    <main class="form-signin w-50 m-auto">

        <img class="mb-4" src="./public/assets/upload/logo/logo.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal text-center">
            Veuillez vous connecter
        </h1>
        <form class="w-100 shadow rounded p-5" method="POST">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="floatingInput" placeholder="Entrez votre email">
                <label for="floatingInput">
                    Entrez votre email
                </label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">
                    Entrez votre mot de passe
                </label>
            </div>

            <div class="d-flex justify-content-between mb-3">
                <div>
                    <a href="#" class="text-decoration-none">
                        Mot de passe oublié ?
                    </a>
                </div>
                <div>
                    Pas encore inscrit ? <a href="register.php" class="text-decoration-none text-dark mx-1">
                        Inscrivez-vous
                    </a>
                </div>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </main>

</div>



<?php require_once 'partials/footer.php' ?>