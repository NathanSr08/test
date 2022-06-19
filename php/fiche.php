<?php
include('../vue/base.php');
include('../class/bdd.php');

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
        update_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,$agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref);
        header('Location:my_leads.php');
    }
   

}
else
{
    if(count($_POST)<5)
    {
        $f = get_one_csv($id,$idd);
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
        if(!isset($ref))
        {
            $ref=0;
        }
        $agem = $_POST['age_mr'];
  
        if(!isset($agem))
        {
            $agem = 0;
        }
        $ageme = $_POST['age_mme'];
        if(!isset($ageme))
        {
            $ageme = 0;
        }
        $enfants = $_POST['enfants'];
        if(!isset($enfants))
        {
            $enfants=0;
        }
        $num_f = $_POST['num_f'];
        if(!isset($num_f))
        {
            $num_f=0;
        }
        add_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,$agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref);
        header('Location:my_leads.php');
    }
}


?>