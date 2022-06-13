<?php
include('../class/bdd.php');include('../class/security.php');
$pdo = get_pdo();
$user = new App\Date\User($pdo);
$nom = $_POST['login'];
$mdp = $_POST['mdp'];
$user = $user->add_user($nom,$mdp);
header('Location:../index.php');

?>