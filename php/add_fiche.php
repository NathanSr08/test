<?php
include('../vue/base.php');
include('../class/bdd.php');
echo count($_POST);
if(count($_POST)<=0)
{
    include('../vue/vadd_fiche.php');
}
else
{
    $count = $_POST['count'];
    $id = $_GET['id'];
    add_fiche($id,$count);
    // header('Location:liste_csv.php');
}


?>