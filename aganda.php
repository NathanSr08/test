
<?php
include('base.php');
if(isset($_SESSION['login'])) {  $id_c = $_SESSION['id']; include('class/Mounth.php');include('class/event.php');
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