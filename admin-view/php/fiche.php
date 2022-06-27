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
    if(count($_POST)<5)
    {
        include('../vue/vfiche.php');
    }
    else
    {
        $nom = $_POST['nom'];
        $ad = $_POST['adresse'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $phone = $_POST['phone'];
        $cp = $_POST['cp'];
        $sit = $_POST['situation_f'];
        $agem = $_POST['age_mr'];
        $ageme = $_POST['age_mme'];
        $enfants = $_POST['enfants'];
        $num_f = $_POST['num_f'];
        $pro_mr = $_POST['pro_mr'];
        $pro_mme = $_POST['pro_mme'];
        $ref = $_POST['ref'];
        $date_p = $_POST['date_p'];
        $conso = $_POST['conso'];
        $age_c = $_POST['age_c'];
        $sup = $_POST['sup'];
        $mode_c = $_POST['mode_c'];
        $planchet_c = $_POST['planchet_c'];
        $age_m = $_POST['age_m'];
        $mat_r = $_POST['mat_r'];
        $stat =  $_POST['stat'];
        $com = $_POST['com'];
        if($com=='')
        {
            $com="";
        }
        if($stat==1)
        {
            tele_confir($idd);
        }

        if($age_m=='')
        {
            $age_m=0;
        }
        if($sup=='')
        {
            $sup=0;
        }
        if($age_c=='')
        {
            $age_c=0;
        }

        if(($ref)=='')
        {
            $ref=0;
        }
    
        if(($agem)=='')
        {
            $agem = 0;
        }
     
        if(($ageme)=='')
        {
            $ageme = 0;
        }
    
        if(($enfants)=='')
        {
            $enfants=0;
        }
     
        if(($num_f)=='')
        {
            $num_f=0;
        }
        update_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,$agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref,$date_p,$conso,
        $age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r,$stat,$com);
        if($_SESSION['role']=="ADMIN"){ header('Location:all_csv.php'); } else {  header('Location:my_leads.php');}
   
        ob_end_flush();
    }
   

}
else
{
    if(count($_POST)<5)
    {
    if($_SESSION['role']=="ADMIN")
    {
        $f = get_one_csv_Admin($idd);
    }
    else
    {
        $f = get_one_csv($id,$idd);
    }
       
        include('../vue/vfiche.php');
    }   
    else
    {
       
        $nom = $_POST['nom'];
        $ad = $_POST['adresse'];
        $email = $_POST['email'];
        $ville = $_POST['ville'];
        $phone = $_POST['phone'];
        $cp = $_POST['cp'];
        $sit = $_POST['situation_f'];
        $pro_mr = $_POST['pro_mr'];
        $pro_mme = $_POST['pro_mme'];
        $ref = $_POST['ref'];
        $date_p = $_POST['date_p'];
        $conso = $_POST['conso'];
        $age_c = $_POST['age_c'];
        $sup = $_POST['sup'];
        $mode_c = $_POST['mode_c'];
        $planchet_c = $_POST['planchet_c'];
        $age_m = $_POST['age_m'];
        $mat_r = $_POST['mat_r'];
        $stat = $_POST['stat'];
        $com = $_POST['com'];
        if($com=='')
        {
            $com="";
        }
        if($age_m=='')
        {
            $age_m=0;
        }
        if($sup=='')
        {
            $sup=0;
        }
        if($age_c=='')
        {
            $age_c=0;
        }

        if(($ref)=='')
        {
            $ref=0;
        }
        $agem = $_POST['age_mr'];
  
        if(($agem)=='')
        {
            $agem = 0;
        }
        $ageme = $_POST['age_mme'];
        if(($ageme)=='')
        {
            $ageme = 0;
        }
        $enfants = $_POST['enfants'];
        if(($enfants)=='')
        {
            $enfants=0;
        }
        $num_f = $_POST['num_f'];
        if(($num_f)=='')
        {
            $num_f=0;
        }
        add_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,$agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref,$date_p,$conso,
        $age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r,$stat,$com);
        if($_SESSION['role']=="ADMIN"){ header('Location:all_csv.php'); } else {  header('Location:my_leads.php');}
        ob_end_flush();
    }
}


?>