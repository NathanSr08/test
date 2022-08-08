<?php
ob_start();
include('base.php');
include('js.php');
if(count($_POST)<=0)
{
    include('../vue/vadd_fiche.php');
}
else
{
    $count = $_POST['count'];
    if($count<=0)
    {
        ?>
        <div class="container">

       
        <div class="alert alert-danger" role="alert">
  Erreur de saisie !
</div>
</div>
        <?php
        include('../vue/vadd_fiche.php');

    }
    else
    {
        
    
    $id = $_GET['id'];
    add_fiche($id,$count);
    ?>
    <div class="container">
    <div class="alert alert-success" role="alert">
    <popup id="fenetre001">
   <p>Ce texte apparaitra dans une fenêtre de type pop-up.</p>
   <p>Celle-ci ne sera activée que lorsque l'utilisateur cliquera sur le lien adéquat.</p>
</popup>
...
<p>Exemple de <a cible="popup:fenetre001">lien qui ouvre le pop-up</a>.</p>

 Leads Attribués !
</div>
    </div>

    <?php
      include('../vue/vadd_fiche.php');
    }
}
?>