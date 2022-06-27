<?php
include('base.php');

if($_SESSION['role']=="ADMIN")
{
   
    if(!isset($_GET['id']))
    {
        $id = $_SESSION['id'];
    }
    else
    {
        $id = $_GET['id'];
    }
}
else
{
    $id = $_SESSION['id'];
}
$logs = get_logs_by_id($id);
if($logs==1)
{
    ?>
    <div class="container">
    <div class="alert alert-secondary" role="alert">
  Aucain logs pour l'instant 
</div>
    </div>
      
    <?php
}
else
{
   
    include('../vue/vlogs.php');
}



?>