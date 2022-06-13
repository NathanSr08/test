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
?>