<?php

function h(string $value):string 
{
    return htmlentities($value);
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


  function count_connect($ip,$count)
  {
    date_default_timezone_set('Europe/Paris');
    $date  = date('d-m-y h:i:s');
    $connect = get_pdo();
    $sql = "insert into connexion_tent (ip,count,date) VALUE ('".$ip."',$count,'".$date."');";
    $ok=$connect->query($sql);
  }
  function verif_ip($ip)
  {
    $connect = get_pdo();
    $sql= "select ip from connexion_tent where ip = '".$ip."';";
    $jeuResultat=$connect->query($sql); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
    $i = 0;

    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $info[$i]['IP']=$ligne->ip;
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
  function connectone($ip)
  {
    date_default_timezone_set('Europe/Paris');
    $date  = date('d-m-y h:i:s');
    $connect = get_pdo();
    $sql= "UPDATE connexion_tent set count = count +1 , date = '".$date."' where ip = '".$ip."';";
    $ok=$connect->query($sql);

  }
  function reset_connect($ip)
  {
    $connect = get_pdo();
    $sql= "UPDATE connexion_tent set count = 0 where ip = '".$ip."';";
    $ok=$connect->query($sql);

  }
  function get_count_connect($ip)
  {
    $connect = get_pdo();
    $sql= "select count from connexion_tent where ip = '".$ip."';";
    $jeuResultat=$connect->query($sql); // on va chercher tous les membres de la table qu'on trie par ordre croissant

    $jeuResultat->setFetchMode(PDO::FETCH_OBJ); // on dit qu'on veut que le resultat soit recuperable sous forme d'objet  
    $i = 0;

    $ligne = $jeuResultat->fetch();
    while($ligne)
    {
        $info[$i]['count']=$ligne->count;
        $ligne=$jeuResultat->fetch();
        $i = $i + 1;
    }
    if(!isset($info))
{
    $info = 0;
}
    $jeuResultat->closeCursor();   // fermer le jeu de r�sultat
    // deconnecterServeurBD($idConnexion);
    return $info;
  }
?>