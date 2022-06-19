<?php 
session_start();
include('../class/bdd.php');include('../class/security.php');
if(isset($_SESSION['id'])) {  header('Location:index2.php'); }
if(count($_POST)>0)
{
    
    $pdo = get_pdo();
$user = new App\Date\User($pdo);
$nom = $_POST['login'];
$mdp = $_POST['mdp'];
$user = $user->verif_login($nom,$mdp);
if($user==0)
{
    
    $u = $_SESSION['login'];
    sendtelegram($u.' s\'est connecter !');
    header('Location:index2.php');
  
}
else
{
    header('Location:vindex.php');
}
}
else
{
    include('vindex.php');
}


?>