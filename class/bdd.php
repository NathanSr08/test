<?php 

function get_pdo(){
    return new \PDO('mysql:host=172.18.0.4;dbname=aganda','root','password',[
        \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
}
function h(string $value):string 
{
    return htmlentities($value);
}


function add_csv($nom,$proprio,$energie,$comso,$tel,$depart)
{
    $connect = get_pdo();
    $requete="INSERT INTO test (Nom,proprio,energie,comso,tel,departement) VALUES ('".$nom."','".$proprio."','".$energie."','".$comso."','".$tel."',$depart);";
    $ok=$connect->query($requete);
    if($ok)
    {
        return 0;
    }
    else
    {
        return 1;
    }
}

function lister_csv()
{
    $connect = get_pdo();
    $requete = "SELECT * from test where id_user=0;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->Nom;
            $info[$i]['Proprio']=$ligne->proprio;
            $info[$i]['Energie']=$ligne->energie;

            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;


  }
  function get_one_csv($id,$idd)
  {
    $connect = get_pdo();
    $requete = "SELECT * from test where id_user=$id and id = $idd ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;
   

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->Nom;
            $info[$i]['Proprio']=$ligne->proprio;
            $info[$i]['Energie']=$ligne->energie;
            $info[$i]['Num']=$ligne->tel;
            $info[$i]['cp']=$ligne->departement;
            $info[$i]['Conso']=$ligne->comso;
            $info[$i]['mode_c']=$ligne->energie;


            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;
  }
  function lister_csv_byuser($id)
{
    $connect = get_pdo();
    $requete = "SELECT * from test where id_user=$id ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->Nom;
            $info[$i]['Proprio']=$ligne->proprio;
            $info[$i]['Energie']=$ligne->energie;

            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;


  }
  function liste_user()
  {
    $connect = get_pdo();
    $requete = "SELECT u.* ,t.nom_t from user u inner join `type-user` t on u.id_type = t.id ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->name;
            $info[$i]['Role']=$ligne->role;
            $info[$i]['Fonction']=$ligne->nom_t;

            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;

  }
  function liste_type_user()
  {
    $connect = get_pdo();
    $requete = "SELECT * from `type-user` ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->nom_t;
          
            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;

  }
  function sendtelegram($text)
  {
  
      $apiToken = "5390471100:AAGMvQgRwpbDlq-9sJ8aBVwxXx0tMQAc7ak";
      $arrContextOptions=array(
          "ssl"=>array(
              "verify_peer"=>false,
              "verify_peer_name"=>false,
          ),
      );
  $data = [
      'chat_id' => '2009065410',
      'text' => 'IP:'.$_SERVER['REMOTE_ADDR'].' '.$text
  ];
  $response = file_get_contents("https://api.telegram.org/bot$apiToken/sendMessage?" .
                                 http_build_query($data), false, stream_context_create($arrContextOptions));
  }
  function add_fiche($id,$count)
  {
    $connect = get_pdo();
    $requete="UPDATE test set id_user = $id where id_user = 0 LIMIT $count;";
  
    $ok=$connect->query($requete);
   
  }
  function add_fiche2($nom,$email,$phone,$cp,$ad,$ville,$id,$sit,$agem,$ageme,$enfants,$num_f,$pro_mme,$pro_mr,$ref,$date_p,$conso,$age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r)
  {
    $connect = get_pdo();
    $requete="INSERT INTO fiche (id_l,nom_f,email,phone,adresse,ville,cp,situation_f,
    age_mr,age_mme,enfants,num_f,pro_mr,pro_mme,ref,
    date_p,conso,age_c,superficie,mode_c,planchet_c,age_m,mat_r)
     VALUE
    ($id,'".$nom."','".$email."','".$phone."','".$ad."',
    '".$ville."',$cp,'".$sit."',$agem,$ageme,$enfants,$num_f,
    '".$pro_mr."','".$pro_mme."',$ref,'".$date_p."','".$comso."',$age_c,$sup,'".$mode_c."','".$planchet_c."',$age_m,'".$mat_r."');";
    $ok=$connect->query($requete);
    
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
  function get_fiche($idd)
  {
    $connect = get_pdo();
    $requete = "SELECT * from fiche where id_l = $idd;";
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
            $info[$i]['conso']=$ligne->conso;
            $info[$i]['age_c']=$ligne->age_c;
            $info[$i]['sup']=$ligne->superficie;
            $info[$i]['mode_c']=$ligne->mode_c;
            //b
            $info[$i]['planchet_c']=$ligne->planchet_c;
            $info[$i]['age_m']=$ligne->age_m;
            $info[$i]['mat_r']=$ligne->mat_r;
         




            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;

  }
  function   update_fiche2($nom,$email,$phone,$cp,$ad,$ville,$idd,$sit,
  $agem,$ageme,$enfants,$num_f,$pro_mr,$pro_mme,$ref,$date_p,$conso,
  $age_c,$sup,$mode_c,$planchet_c,$age_m,$mat_r)
  {
    $connect = get_pdo();
    $requete="UPDATE fiche set nom_f = '".$nom."',email = '".$email."',
    phone='".$phone."',adresse='".$ad."',ville='".$ville."',cp=$cp,
    situation_f='".$sit."', age_mr = $agem,age_mme = $ageme, enfants=$enfants,
    num_f=$num_f,pro_mr='".$pro_mr."',pro_mme='".$pro_mme."',ref=$ref,date_p='".$date_p."',
    conso = '".$conso."',age_c = $age_c,superficie=$superficie,mode_c='".$mode_c."',
    planchet_c = '".$planchet_c."',age_m=$age_m,mat_r='".$mat_r."'
     where id_l = $idd ;";
    $ok=$connect->query($requete);
    echo $requete;
    
  }


?>

