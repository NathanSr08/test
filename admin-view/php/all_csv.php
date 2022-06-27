<?php
ob_start();
include('base.php');
// include('js.php');

if(isset($_SESSION['id']) and $_SESSION['role']!="ADMIN")
{
    header('Location:my_leads.php?er=2');
}
if(isset($_GET['er']))
{
   ?>
   <div class="alert alert-danger" role="alert">
 La fiche n'a pas été créer !
</div>
<?php
}
$cl = lister_csv_byuser_all();
include('../vue/vliste_leads.php');