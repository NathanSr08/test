
<?php
require('../vue/base.php');

if(isset($_POST['import']))
{
    $FileName =  $_FILES['test']['tmp_name'];
    if($_FILES['test']['size']>0)
    {
        $filext = ".".strtolower(substr(strrchr($_FILES['test']['name'], '.'), 1));
        if($filext!=".csv")
        {
           header('Location:add_csv.php');
        }
        $file = fopen($FileName,"r");
        while(($colone = fgetcsv($file,1000,";")) !== FALSE)
        {

           $add =  add_csv($colone[0],$colone[1],$colone[2],$colone[3],$colone[4],$colone[5]);

           if($add == 0)
           {

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
}
else
{
    require('../vue/vimport.php');

}

