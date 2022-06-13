<?php
include('../class/event.php');
include('../class/bdd.php');
$pdo = get_pdo();
$events = new App\Date\Events($pdo);
$id = $_GET['id'];
$events = $events->del_event($id);
header('Location:../index.php');
?>