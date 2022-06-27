<?php
include('../../class/bdd.php');include('../../class/security.php');
session_start();
$pdo = get_pdo();
$i = $_SESSION['id'];
logout_etat($i);
$u = $_SESSION['login'];
$notif = "Deconnexion interface ";
sendtelegram($u.' s\'est Deconnecter !');
add_logs($i,$notif);
$user = new App\Date\User($pdo);
$user = $user->logout();
session_destroy();
header('Location:/admin-view');
?>