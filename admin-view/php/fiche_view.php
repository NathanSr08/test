<?php
ob_start();
require('base.php');
include('js.php');


$id = $_SESSION['id'];
$idd = $_GET['id'];
$test =  verif_fiche($idd);
if($test==0)
{
    $f = get_fiche($idd);
    include('../vue/vfiche_view.php');

}
else
{
    if($_SESSION['role']=="ADMIN")
    {
        header('Location:all_csv.php?er=1');
    }
    else
    {
        header('Location:my_leads.php?er=1');
    }
   
}