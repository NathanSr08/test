<?php
function add_logs($id_c,$notif)
{
    date_default_timezone_set('Europe/Paris');
    $date = date('d-m-y h:i:s');
    $time = date('h:i:s');
   
    $connect = get_pdo();
    $requete="INSERT INTO logs (date,id_c,notif,time) VALUES ('".$date."',$id_c,'".$notif."','".$time."');";
    $ok=$connect->query($requete);
}
function get_id_by_login($login)
{
    $connect = get_pdo();
    $requete = "SELECT id from user where name = '".$login."' ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
           

            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        return $info;


  }

function get_logs_by_id($id)
{
    $connect = get_pdo();
    $requete = "SELECT * from logs where id_c = $id ORDER BY date,time ASC  ;";
    $jeuResultat=$connect->query($requete); // on va chercher tous les membres de la table qu'on trie par ordre croissant

        $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
        $i = 0;

        $ligne = $jeuResultat->fetch();
        while($ligne)
        {

            $info[$i]['ID']=$ligne->id;
            $info[$i]['Date']=$ligne->date;
            $info[$i]['Time']=$ligne->time;
            $info[$i]['ID_C']=$ligne->id_c;
            $info[$i]['Notif']=$ligne->notif;

           

            $ligne=$jeuResultat->fetch();
            $i = $i + 1;

        }
        $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
        // deconnecterServeurBD($idConnexion);
        if(!isset($info))
        {
            $info = 1;
        }
        return $info;

}



?>