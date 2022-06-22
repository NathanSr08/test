<?php 

function get_pdo(){
    return new \PDO('mysql:host=172.18.0.4;dbname=aganda','root','password',[
        \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC
    ]);
}
  include('Fonction/fiche.php');
  include('Fonction/count.php');
  include('Fonction/leads.php');
  include('Fonction/users.php');
  include('Fonction/autre.php');
  include('Fonction/logs.php');
?>

