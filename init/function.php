
<?php

function inputCleaning($name)
{
    if (!empty($_POST["$name"])) {
        return htmlspecialchars(addslashes($_POST["$name"]));
    } else {
        $error['empty'] = "The $name is required. ";
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
