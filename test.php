<?php include('class/bdd.php');
$a = count_leads_user();
var_dump($a);
echo $a['COUNT(id)'];
?>