<?php 

function get_pdo(){
    return new \PDO('mysql:host=172.18.0.3;dbname=aganda','root','password',[
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


  }


?>

