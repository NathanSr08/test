<!DOCTYPE html>
<?php session_start();if(isset($_SESSION['login'])) {  $id_c = $_SESSION['id']; include('class/Mounth.php');include('class/event.php');?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSS only -->
    
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<link rel="stylesheet" href="asset/css/main.css">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../index.php"><?php echo $_SESSION['login']; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <?php if($_SESSION['role']=="ADMIN")
      { ?>
      <a class="nav-item nav-link active" href="../php/add_csv.php">Ajouter leads</a>
      <a class="nav-item nav-link active" href="../php/liste_csv.php">Lister leads</a>
      <a class="nav-item nav-link" href="vue/vadd_user.php">Add user</a>
      <?php } ?>
      <a class="nav-item nav-link" href="php/logout.php">logout</a>
      <a class="nav-item nav-link disabled" href="#">Disabled</a>
    </div>
  </div>
</nav>

<?php
try{
$mount = new App\Date\Mounth($_GET['mois'] ?? null, $_GET['year'] ?? null);



}
catch (\Exception $e) { 
  $mount = new App\Date\Mounth();
  }
$start = $mount->getFirstDay();
$start = $start->format('N') === '1' ? $start:  $mount->getFirstDay()->modify('last monday');
$sem = $mount->getweeks();
$end = (clone $start)->modify('+' . (6 + (7 * ($sem - 1))).' days');
require('class/bdd.php');
$pdo = get_pdo();
  $events = new App\Date\Events($pdo);
  if($_SESSION['role']=='USER')
  {
    $events = $events->geteventbetweenbyday($start,$end,$id_c);
  }
  else
  {
    $events = $events->geteventbetweenbydayAdmin($start,$end);
  }

  // echo '<pre>';
  // var_dump($events);
  // echo '</pre>';

  
  // echo '<pre>';
  // var_dump($event);
  // echo '</pre>';
  ?>
<div class="d-flex flex-row align-item-center justify-content-between mx-sm-3">




<div class="calandar">
<h3><?php  echo $mount->toString();?></h3>
<div>
  <a href="aganda.php?mois=<?php echo $mount->precMonth()->month;?>&year=<?php echo $mount->precMonth()->year;?>"  class="btn btn-primary">&lt</a>
  <a href="aganda.php?mois=<?php echo $mount->nextMonth()->month;?>&year=<?php echo $mount->nextMonth()->year;?>"  class="btn btn-primary">&gt</a><p></p>
  <a href="vue/Vadd_event.php"><button type="button" class="btn btn-primary">+</button></a>
</div>
</div>

<br>
<table class="calandar__table">
  
  
  <?php for($i=0;$i<$mount->getweeks();$i++){ ?>
  <tr>
   <?php foreach($mount->days as $k => $day):?>
   <?php $date = (clone $start)->modify('+ '.$k+($i * 7).' days');
         $eventsForDay = $events[$date->format('Y-m-d')] ?? []; 
       
   ?>
<td class="<?php if($mount->verifdayinmonth($date)){?>''<?php } else{ ?>prout<?php } ?>">
  <?php if($i==0):?>
    <div class="calandar__day"><?php echo $day ?></div>
    <?php  endif;?>
   
    <div class="calandar_numday"><?php echo (clone $start)->modify('+ '.$k+($i * 7).' days')->format('d'); ?></div>
    <?php foreach($eventsForDay as $event):  ?>
      <?php if($mount->verifdayinmonth($date)){
        ?>
  <div class="event"><?php echo (new DateTime($event["start"]))->format('H:i') ?> - <a href="/vue/event.php?id=<?php echo $event["id"]?>"><?php echo  $event["name"] ?></a></div>
  <?php
       } ?>
   
      <?php endforeach;?>
    </td>
   
    <?php endforeach; ?>

    
    

  
</tr>
<?php }  ?>
<div class="col">


    </div>
</table>
</div>
</body>
</html>
<?php } else{
  header('Location:index.php');
} ?>