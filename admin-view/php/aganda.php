
<?php

include('../php/base.php');
include('../php/js.php');
require('../../class/bdd.php');
if(isset($_SESSION['login'])) {  $id_c = $_SESSION['id']; include('../../class/Mounth.php');include('../../class/event.php');
    if(isset($_GET['er']))
    {
      if($_GET['er']==1)
      {
        ?>
        <div class="alert alert-danger" role="alert">
   Accées refusé!
  </div>
  <?php
      }
    }
include('../vue/vaganda.php');
}
else
{
    header('Location:../index.php');
}
?>