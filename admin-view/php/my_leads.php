<?php 
include('base.php');

include('../../class/bdd.php');

if(isset($_GET['er']))
{
   if($_GET['er']==1)
   {

   
   ?>
   <div class="alert alert-danger" role="alert">
 La fiche n'a pas été créer !
</div>
   
<?php
   }
   if($_GET['er']==2)
   {
      ?>
      <div class="alert alert-danger" role="alert">
     Accès Refuser !
     </div>
     <?php
   }
   
}
$id = $_SESSION['id'];
// echo $_SESSION['fonction'];
if($_SESSION['fonction']=="Confirmateur")
 {
    $cl =  lister_csv_byuser_conf($id);
    include('../vue/vliste_leads.php');
 }
 else
 {
    $cl = lister_csv_byuser($id);
    if($cl==1)
    {
      ?>
      <div class="container">
      <div class="alert alert-secondary" role="alert">
 Aucain leads attribués
</div>
      </div>
      
<?php
    }
    else
    {
      include('../vue/vliste_leads.php');
    } 
   

 }


?>
