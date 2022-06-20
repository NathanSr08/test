<?php 
include('base.php');
include('js.php');
include('../../class/bdd.php');
if(isset($_SESSION['id']) and $_SESSION['role']!="ADMIN")
{
    header('Location:../../aganda.php?er=1');
}
if(isset($_POST['import']))
{
    $FileName =  $_FILES['test']['tmp_name'];
    if($_FILES['test']['size']>0)
    {
        $filext = ".".strtolower(substr(strrchr($_FILES['test']['name'], '.'), 1));
        if($filext!=".csv")
        {
            ?><div class="alert alert-danger" role="alert">
           Veuillez importer des fichier en format CSV!
         </div><?php
         include('../vue/vimport.php');die;
        }
        $file = fopen($FileName,"r");
        while(($colone = fgetcsv($file,1000,";")) !== FALSE)
        {
            $p = utf8_decode($colone[1]);
            $p= str_replace('?','é',$p);
            $f = utf8_encode($colone[3]);
            $c = str_replace('','€',$f);
            //   echo $colone[0]; echo '<br>';
            //   echo  $p;  echo '<br>'; echo  utf8_decode($colone[2]); echo '<br>'; echo $c; echo '<br>'; echo $colone[4]; echo '<br>';  echo $colone[5];

           $add =  add_csv($colone[0],$p,$colone[2],$c,$colone[4],$colone[5]);
        }

           if($add == 0)
           {
            $u = $_SESSION['login'];
            sendtelegram($u.'a rajouter un fichier csv  !');
              ?><div class="alert alert-success" role="alert">
             Importation Reussi Vous pouvez la voir sur le lien suivant: <a href=" http://192.168.1.15:8080/index.php?route=/sql&server=1&db=lab-csv&table=test&pos=0" target="_blank">phpmyadmin</a>
            </div><?php
            include('../vue/vimport.php');
           }
           else
           {
            ?><div class="alert alert-danger" role="alert">
              Importation echouer !
           </div><?php
           include('../vue/vimport.php');
           }


        }

    }

else
{
    require('../vue/vimport.php');

}

?>