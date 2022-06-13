<?php
include('../class/bdd.php');include('../class/security.php');
session_start();
$pdo = get_pdo();
$user = new App\Date\User($pdo);
$user = $user->logout();
session_destroy();
header('Location:../aganda.php');
?>