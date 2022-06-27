<?php
ob_start();
include('../../class/event.php');
include('../../class/Mounth.php');
include('base.php');
include('js.php');
if(count($_POST)<6)
{
    include('../vue/Vadd_event.php');
}
else
{



$pdo = get_pdo();
$events = new App\Date\Events($pdo);
$id = $_POST['id'];
$nom = $_POST['nom'];
$des = $_POST['des'];
$date = $_POST['date'];
$start = $_POST['start'];
$end = $_POST['end'];
if($start>=$end)
{
    ?>
    <div class="container">
    <div class="alert alert-danger" role="alert">
Horaire incorrecte !
</div>
    </div>
    <?php
    include('../vue/Vadd_event.php');
}
else
{
    $events = $events-> add_event($nom,$des,$date,$start,$end,$id);
    header('Location:aganda.php');
}

}




?>