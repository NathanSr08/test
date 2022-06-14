<?php

if(count($_POST)>=2)
{
    include('../class/bdd.php');include('../class/security.php');
    $pdo = get_pdo();
$user = new App\Date\User($pdo);
$nom = $_POST['login'];
$mdp = $_POST['mdp'];
$id_t = $_POST['test'];
$user = $user->add_user($nom,$mdp,$id_t);
header('Location:lister_user.php');

}
else
{
    include('../class/bdd.php');
    $type = liste_type_user();
    include('../vue/vadd_user.php');
}


?>