<?php
include('../class/bdd.php');include('../class/security.php');

$pdo = get_pdo();
$user = new App\Date\User($pdo);
$nom = $_POST['login'];
$mdp = $_POST['mdp'];
$user = $user->verif_login($nom,$mdp);


if($user==0)
{
    $u = $_SESSION['login'];
    sendtelegram($u.' s\'est connecter !');
    header('Location:../aganda.php');
}
else
{
    header('Location:../index.php');
}


?>