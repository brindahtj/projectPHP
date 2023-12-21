
<?php

function inputCleaning($name)
{
    if (!empty($_POST["$name"])) {
        return htmlspecialchars(addslashes($_POST["$name"]));
    } else {
        $error['empty'] = "The $name is required. ";
    }
}
function specialchars($name)
{
    if (!empty($_POST["$name"])) {
        return htmlspecialchars(addslashes($_POST["$name"]));
    }
}
function checkCharacter($name)
{
    if (strlen($_POST["$name"]) > 4 && strlen($_POST["$name"]) < 50) {
        echo "";
    } else {
        $error['char'] =  "The $name required to have between 4 and 50 characters. ";
    }
}

function userConnected()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

function userIsAdmin()
{
    if (userConnected() && $_SESSION['user']['statut'] == 1) {
        return true;
    } else {
        return false;
    }
}

function creation_panier()
{
    if (!isset($_SESSION['panier'])) {
        $_SESSION['panier'] = [];
        $_SESSION['panier']['id'] = [];
        $_SESSION['panier']['qte'] = [];
        $_SESSION['panier']['prix'] = [];
    }
}




function ajoutProduit($id, $qte, $prix)
{

    creation_panier();
    $position = array_search($id, $_SESSION['panier']['id']);
    var_dump($position);

    if ($position !== false) {
        $_SESSION['panier']['qte'][$position] += $qte;
    } else {

        $_SESSION['panier']['id'] = [$id];
        $_SESSION['panier']['qte'] = [$qte];
        $_SESSION['panier']['prix'] = [$prix];
        var_dump($_SESSION['panier']);
    }


    // if (array_search($id, $_SESSION['panier']['id'])) {

    //     var_dump($position);
    // } else {
    //     $_SESSION['panier']['id'] = $id;
    //     $_SESSION['panier']['qte'] = $qte;
    //     $_SESSION['panier']['prix'] = $prix;
    // }
}

// function montantTotal()

// {

//     return $_SESSION['panier']['prix'] * $_SESSION['panier']['qte'];
// }
