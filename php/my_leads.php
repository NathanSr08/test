<?php
include('../vue/base.php');
include('../class/bdd.php');
$id = $_SESSION['id'];
// echo $_SESSION['fonction'];
if($_SESSION['fonction']=="Confirmateur")
 {
    $cl =  lister_csv_byuser_conf($id);
 }
 else
 {
    $cl = lister_csv_byuser($id);
 }

include('../vue/vlister.php');
