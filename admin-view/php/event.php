<?php
ob_start();
include('base.php');
include('js.php');
include('../../class/bdd.php');
include('../../class/event.php');
$pdo = get_pdo();
$events = new App\Date\Events($pdo);

if(!isset($_GET['id']))
{
  header('Location:../404.php');
}
$event = $events->find($_GET['id'] ?? null);
if($event==FALSE)
{
  header('Location:../404.php');
}
else
{
    include('../vue/vevent.php');
}