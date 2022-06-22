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
   
    $i = $_SESSION['id'];
    $notif = "Connexion Reussi";
    add_logs($i,$notif);
    sendtelegram($u.' s\'est connecter !');
    header('Location:index2.php');
  
}
else
{
    $ver = veri_login_user($nom);
    if($ver==1)
    {
        $l = get_id_by_login($nom);
        $id_login = $l[0]['ID'];
        $notif = "Tentative de connexion échoué !";
        add_logs($id_login,$notif);
    }
   
    header('Location:index.php');
}
}
else
{
    include('vindex.php');
}


?>