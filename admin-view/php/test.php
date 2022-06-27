<?php
session_start();
include('../../class/bdd.php');
$id = $_SESSION['id'];
$a = logout_auto($id);
var_dump($a);
?>