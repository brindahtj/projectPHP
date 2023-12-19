<?php
require_once 'init/init.php';
$regex = '#^[a-zA-Z0-9.*-]+$#';
$error = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gender = inputCleaning('gender');
    $firstname = inputCleaning('firstname');
    $lastname = inputCleaning('lastname');
    $email = inputCleaning('email');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error['email'] = "Email is not valid!";
    };
    $username = inputCleaning('username');
    checkCharacter('username');
    preg_match($regex, $username) ? "" : $error['regex'] = "The username must have just alphanumeric characters";
    $password = inputCleaning('password');
    $confirmpassword = inputCleaning('confirmpassword');
    checkCharacter('password');
    if ($password === $confirmpassword) {
        $password = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $error['confirmpassword'] =  "the password is not the same!";
    }
    $adress = inputCleaning('address');
    $city = inputCleaning('city');
    $zipcode = inputCleaning('zipcode');
    $country = inputCleaning('country');

    $query = "SELECT * FROM membre WHERE email=:email";
    $query2 = "SELECT * FROM membre WHERE pseudo=:username";

    $data = $pdo->prepare($query);
    $data->bindValue(':email', $email, PDO::PARAM_STR);
    $data->execute();

    $data2 = $pdo->prepare($query2);
    $data2->bindValue(':username', $username, PDO::PARAM_STR);
    $data2->execute();

    if ($data->rowCount() > 0) {
        $error['emaildb'] =  "The email already exists in the database";
    }
    if ($data2->rowCount() > 0) {
        $error['usernamedb'] =  "Username already exists";
    }

    $image = '';

    if (!empty($_FILES['picture']['name'])) {
        $image = $_FILES['image']['name'];


        $picture = time() . '-' . rand(1, 9999) . '-' . bin2hex(random_bytes(8)) . '-' . $image;
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $ext = strtolower($ext);
        $tabExtension = ['jpg', 'png', 'jpeg', 'gif'];

        if (in_array($ext, $tabExtension)) {


            // je verifie que le fichier ne dépasse 8 Mo
            if (!$_FILES['image']['size'] <= 800000) {
                $error['img'] = "Image must be smaller to 8Mo ";
            } else {
                move_uploaded_file($_FILES['image']['tmp_name'], BASE . $picture);
            }
        } else {
            $error['ext'] =  "the extension is not valid.";
        }
    }

    if (count($error) == 0) {
        $query3 = "INSERT INTO `membre`( `civilite`, `pseudo`, `mdp`, `nom`, `prenom`, `email`, `adresse`, `code_postal`, `ville`, `pays`, `picture`) VALUES (:gender, :username, :password, :lastname, :firstname, :email, :address, :zipcode, :city, :country, :picture)";
        $req = $pdo->prepare($query3);
        $req->bindParam(':gender', $gender, PDO::PARAM_STR);
        $req->bindParam(':username', $username, PDO::PARAM_STR);
        $req->bindParam(':password', $password, PDO::PARAM_STR);
        $req->bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $req->bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $req->bindParam(':email', $email, PDO::PARAM_STR);
        $req->bindParam(':address', $address, PDO::PARAM_STR);
        $req->bindParam(':zipcode', $zipcode, PDO::PARAM_INT);
        $req->bindParam(':city', $city, PDO::PARAM_STR);
        $req->bindParam(':country', $country, PDO::PARAM_STR);
        $req->bindParam(':picture', $picture, PDO::PARAM_STR);
        $result = $req->execute();

        if ($result) {
            echo "You've been registered successfully";
            header('Location: login.php');
        }
    } else {
        var_dump($error);
    }
}
if (userConnected()) {
    header('Location:profil.php');
    exit();
}

?>
<?php require_once 'partials/header.php' ?>

<div class="container">

    <main class="form-signin w-100 m-auto">
        <h1 class="h3 mb-3 fw-normal text-center">
            Inscrivez-vous
        </h1>

        <form class="p-5" method="POST" enctype="multipart/form-data">
            <div class="info mb-3 row">
                <div class="col-md-6">
                    <div class="form-group mb-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                            <label class="form-check-label" for="male">Homme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                            <label class="form-check-label" for="female">Femme</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="autre" value="autre">
                            <label class="form-check-label" for="autre">Autre</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="firstname" id="firstname" class="form-control form-control-lg form-control form-control-lg-lg" placeholder="Entrez votre prénom">
                        </div>
                        <div id="helpBlock" class="form-text"> <?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="username" id="username" class="form-control form-control-lg" placeholder="Entrez votre nom d'utilisateur">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?><?= isset($error['regex']) ? $error['regex']  : "" ?><?= isset($error['usernamedb']) ? $error['usernamedb']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Entrez votre mot de passe">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-house-door"></i></span>
                            <input type="text" name="address" id="address" class="form-control form-control-lg" placeholder="Entrez votre adresse">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                            <input type="text" name="zipcode" id="zipcode" class="form-control form-control-lg" placeholder="Entrez votre code postal">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                            <input type="text" name="lastname" id="lastname" class="form-control form-control-lg" placeholder="Entrez votre nom">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                            <input type="text" name="email" id="email" class="form-control form-control-lg" placeholder="Entrez votre email">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?><?= isset($error['email']) ? $error['email']  : "" ?> <?= isset($error['emaildb']) ? $error['emaildb']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-lock"></i></span>
                            <input type="password" name="confirmpassword" id="confirm-password" class="form-control form-control-lg" placeholder="Confirmez votre mot de passe">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?><?= isset($error['confirmpassword']) ? $error['confirmpassword']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input type="text" name="city" id="city" class="form-control form-control-lg" placeholder="Entrez votre ville">
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <label class="input-group-text form-control-lg" for="country"><i class="bi bi-globe"></i></label>
                            <select class="form-select" name="country" id="country">
                                <option value="france">France</option>
                                <option value="belgique">Belgique</option>
                                <option value="suisse">Suisse</option>
                                <option value="luxembourg">Luxembourg</option>
                                <option value="italie">Italie</option>
                                <option value="canada">Canada</option>
                                <option value="espagne">Espagne</option>
                                <option value="portugal">Portugal</option>
                                <option value="allemagne">Allemagne</option>
                                <option value="royaume-uni">Royaume-Uni</option>
                                <option value="usa">États-Unis</option>
                                <option value="australie">Australie</option>
                                <option value="japon">Japon</option>
                                <option value="auttre-pays">Autre</option>
                            </select>
                        </div>
                        <div id="helpBlock" class="form-text"><?= isset($error['empty']) ? $error['empty']  : "" ?></div>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="image" id="profile-picture" accept="image/*">
                    </div>
                    <div id="helpBlock" class="form-text"><?= isset($error['ext']) ? $error['ext']  : "" ?><?= isset($error['img']) ? $error['img']  : "" ?></div>


                </div>
            </div>

            <div class="d-flex mb-3">
                Déjà inscrit ? <a href="login.php" class="text-decoration-none text-dark mx-1"> Connectez-vous</a>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">
                S'inscrire
            </button>
        </form>

    </main>

</div>



<?php require_once 'partials/footer.php' ?>