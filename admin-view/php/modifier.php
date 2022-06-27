<?php
include('../../class/event.php');
$pdo = get_pdo();
$events = new App\Date\Events($pdo);
$id= $_GET['id'];
$nom = $_POST['nom'];
$des = $_POST['des'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];

$events = $events-> edit_event($id,$nom,$des,$date,$start,$end);
header('Location:aganda.php');





?>