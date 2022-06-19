
<?php
include('../vue/base.php');
include('../class/bdd.php');
if(isset($_SESSION['id']) and $_SESSION['role']!="ADMIN")
{
    header('Location:../aganda.php?er=1');
}
$cl = liste_user();
include('../vue/vlister_user.php');
?>