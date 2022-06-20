<?php
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

  function get_one_csv_Admin($idd)
  {
    $connect = get_pdo();
    $requete = "SELECT * from test where  id = $idd ;";
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
    $requete = "SELECT * from test where id_user=$id and id_c = 0 ;";
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
    // echo $requete;


  }
  function lister_csv_byuser_all()
  {
      $connect = get_pdo();
      $requete = "SELECT * from test ;";
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
      // echo $requete;
  
  
    }
  function lister_csv_byuser_conf($id)
  {
      $connect = get_pdo();
      $requete = "SELECT * from test where  id_c = 2 ;";
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
      // echo $requete;
  
  
    }

?>