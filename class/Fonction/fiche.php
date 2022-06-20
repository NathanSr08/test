<?php

function get_fiche($idd)
  {
    $connect = get_pdo();
    $requete = "SELECT * from fiche where id = $idd;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->nom_f;
            $info[$i]['ad']=$ligne->adresse;
            $info[$i]['cp']=$ligne->cp;
            $info[$i]['Num']=$ligne->phone;
            $info[$i]['email']=$ligne->email;
            $info[$i]['ville']=$ligne->ville;
            $info[$i]['sit']=$ligne->situation_f;
            $info[$i]['age_mr']=$ligne->age_mr;
            $info[$i]['age_mme']=$ligne->age_mme;
            $info[$i]['enfants']=$ligne->enfants;
            $info[$i]['num_f']=$ligne->num_f;
            $info[$i]['pro_mr']=$ligne->pro_mr;
            $info[$i]['pro_mme']=$ligne->pro_mme;
            $info[$i]['ref']=$ligne->ref;
            //a
            $info[$i]['date_p']=$ligne->date_p;
            $info[$i]['Conso']=$ligne->conso;
            $info[$i]['age_c']=$ligne->age_c;
            $info[$i]['sup']=$ligne->superficie;
            $info[$i]['mode_c']=$ligne->mode_c;
            //b
            $info[$i]['planchet_c']=$ligne->planchet_c;
            $info[$i]['age_m']=$ligne->age_m;
            $info[$i]['mat_r']=$ligne->mat_r;
            $info[$i]['stat']=$ligne->stat;
         




            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;

  }

  function   update_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,
  $agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref,$date_p,$conso,
  $age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r,$stat)
  {
    $connect = get_pdo();
    $requete="UPDATE fiche set nom_f = '".$nom."',email = '".$email."',
    phone='".$phone."',adresse='".$ad."',ville='".$ville."',cp=$cp,
    situation_f='".$sit."', age_mr = $agem,age_mme = $ageme, enfants=$enfants,
    num_f=$num_f,pro_mr='".$pro_mr."',pro_mme='".$pro_mme."',ref=$ref,date_p='".$date_p."',
    conso = '".$conso."',age_c = $age_c,superficie=$sup,mode_c='".$mode_c."',
    planchet_c = '".$planchet_c."',age_m=$age_m,mat_r='".$mat_r."',stat=$stat
     where id_l = $idd ;";
    $ok=$connect->query($requete);
    // echo $requete;
  }

  function verif_fiche($id)
  {
    $connect = get_pdo();
    $requete = "select * from fiche where id_l = $id ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
    $i = 0;

    $ligne = $jeuResultat->fetch();
    if($ligne)
    {
        return 0;
    }
    else
    {
        return 1;
    }
  }

  function add_fiche2($nom,$email,$phone,$cp,$ad,$ville,$id,$sit,$agem,$ageme,$enfants,$num_f,$pro_mme,$pro_mr,$ref,$date_p,$conso,$age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r,$stat)
  {
    $connect = get_pdo();
    $requete="INSERT INTO fiche (id_l,nom_f,email,phone,adresse,ville,cp,situation_f,
    age_mr,age_mme,enfants,num_f,pro_mr,pro_mme,ref,
    date_p,conso,age_c,superficie,mode_c,planchet_c,age_m,mat_r,stat)
     VALUE
    ($id,'".$nom."','".$email."','".$phone."','".$ad."',
    '".$ville."',$cp,'".$sit."',$agem,$ageme,$enfants,$num_f,
    '".$pro_mr."','".$pro_mme."',$ref,'".$date_p."','".$conso."',$age_c,$sup,'".$mode_c."','".$planchet_c."',$age_m,'".$mat_r."',$stat);";
    $ok=$connect->query($requete);
    // echo $requete;
    
  }

  function add_fiche($id,$count)
  {
    $connect = get_pdo();
    $requete="UPDATE test set id_user = $id where id_user = 0 LIMIT $count;";
  
    $ok=$connect->query($requete);
   
  }

  function tele_confir($id)
  {
    $connect = get_pdo();
    $requete="UPDATE test set id_c = 2 where id = $id;";
    $ok=$connect->query($requete);

  }

?>