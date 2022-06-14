<?php
include('../class/event.php');
include('../class/bdd.php');

$pdo = get_pdo();
$events = new App\Date\Events($pdo);
$id = $_POST['id'];
$nom = $_POST['nom'];
$des = $_POST['des'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];

$events = $events-> add_event($nom,$des,$date,$start,$end,$id);
header('Location:../index.php');





?>