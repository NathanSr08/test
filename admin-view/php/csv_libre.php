<?php
include('base.php');
include('js.php');

include('../../class/bdd.php');
// if(isset($_SESSION['id']) and $_SESSION['role']!="ADMIN")
// {
//     header('Location:../aganda.php?er=1');
// }

$cl = lister_csv();
include('../vue/vliste_leads.php');