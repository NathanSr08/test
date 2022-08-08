<?php 
session_start();
include('../class/bdd.php');include('../class/security.php');
if(isset($_SESSION['id'])) {  header('Location:index2.php'); }

$ip = $_SERVER['REMOTE_ADDR'];
if(verif_ip($ip)==0)
{
    count_connect($ip,0);
}
$h = get_count_connect($ip); echo $h[0]['count'];
if($h[0]['count']>3)
{
    header('location:404.php');
}
if(count($_POST)>0)
{
    $nom =  $_POST['login'];
    $single= str_replace("'", ".", $nom, $count);
    $double = str_replace('"', ".", $single, $count);
    $nom = str_replace('/', ".", $double, $count);
 
    // phpinfo();
    
    $pdo = get_pdo();
$user = new App\Date\User($pdo);
$nom = $_POST['login'];
$mdp = $_POST['mdp'];

$user = $user->verif_login($nom,$mdp);
$ip = $_SERVER['REMOTE_ADDR'];

$h = get_count_connect($ip); echo $h[0]['count'];
if($h[0]['count']>3)
{
    header('location:404.php');
}
if($user==0)//Si la connexion est reussi 
{
  
    if($h[0]['count']>3)
    {
        header('location:404.php');
    }
    else
    {
        $u = $_SESSION['login'];
   
        $i = $_SESSION['id'];
        $notif = "Connexion Reussi";
       
        reset_connect($ip);
        add_logs($i,$notif);
      
        sendtelegram($u.' s\'est connecter !');
        header('Location:index2.php');
    }
  
  
}
else
{
    if(verif_ip($ip)==0)
    {
        count_connect($ip,0);
    }
   
    if(verif_ip($ip)==1)
    {
        connectone($ip);
    }
   
    $ver = veri_login_user($nom);
    if($ver==1)//Si le nom d'uttilisateur est correcte
    {
        $l = get_id_by_login($nom);
        $id_login = $l[0]['ID'];
        $notif = "Tentative de connexion échoué !";//ajoute dans les log que le user a tenter de se connecter
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