<?php
ob_start();
include('base.php');
include('js.php');
include('../../class/bdd.php');
if(count($_POST)<=0)
{
    include('../vue/vadd_fiche.php');
}
else
{
    $count = $_POST['count'];
    $id = $_GET['id'];
    add_fiche($id,$count);
    header('Location:../index2.php');
}
?>