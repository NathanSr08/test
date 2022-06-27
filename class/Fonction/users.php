<?php

function liste_user()
  {
    $connect = get_pdo();
    $requete = "SELECT u.time,u.etats,u.* ,t.nom_t from user u inner join `type_user` t on u.id_type = t.id ;";
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
            $info[$i]['Etats']=$ligne->etats; 
            $info[$i]['Time']=$ligne->time;



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
    $requete = "SELECT * from `type_user` ;";
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

  function veri_login_user($name)
  {
    $connect = get_pdo();
    $requete = "SELECT * from user where name = '".$name."' LIMIT 0,1;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Nom']=$ligne->name;
          
            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        if(isset($info))
        {
          $info = 1;
        }
        else
        {
          $info = 0;
        }
        return $info;

  }
  function logout_etat($id)
{
    date_default_timezone_set('Europe/Paris');
    $date = date('d-m-y h:i:s');
   
   
    $connect = get_pdo();
    $requete="UPDATE `user` set etats = 0,time = '".$date."' where id = $id;";
    $ok=$connect->query($requete);
}
function set_time($id)
{
  date_default_timezone_set('Europe/Paris');
    $date = date('h:i:s');
   
   
    $connect = get_pdo();
    $requete="UPDATE `user` set time = '".$date."' where id = $id;";
    $ok=$connect->query($requete);
}
function logout_auto($id)
{

  $connect = get_pdo();
  $requete = "SELECT id,time from user;";
  $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

      $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
      $i = 0;

      $ligne = $jeuResultat->fetch();
      while($ligne)
      {

          $info[$i]['Time']=$ligne->time;
          $info[$i]['ID']=$ligne->id;
        
        
          $ligne=$jeuResultat->fetch();
          $i = $i + 1;

      }
      $jeuResultat->closeCursor();


     date_default_timezone_set('Europe/Paris');
    $d = new DateTime(date('h:i:s'));
    


$i = 0;
while($i<count($info))
{
    $id = $info[$i]['ID'];
    $d2 = new DateTime($info[$i]["Time"]);
    $int = $d->diff($d2);
    $int = (array) $int;
    $diff = $int["h"];
    if($diff>=1)
   {
       $sql = "UPDATE user set etats = 0 where id = $id";
       $ok = $connect->query($sql);
   }
   $i = $i+1;

   
}



    

}

?>