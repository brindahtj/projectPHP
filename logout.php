<?php
require_once 'init/init.php';
unset($_SESSION['user']);
header('Location:index.php');
// var_dump($_SESSION['user']);
exit;

// if (isset($_GET['key']) && $_GET['key'] == 'lougout') {
//     session_destroy();
//     header('Location:index.php');
// }
