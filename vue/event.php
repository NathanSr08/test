

<?php
include('base.php');
include('../class/bdd.php');
include('../class/event.php');
$pdo = get_pdo();
$events = new App\Date\Events($pdo);

if(!isset($_GET['id']))
{
  header('Location:error.php');
}
$event = $events->find($_GET['id'] ?? null);
if($event==FALSE)
{
  header('Location:error.php');
}
else
{





?>


<div class="container">
    <h3>Edit Evenement</h3>
<form action="../php/modifier.php?id=<?php  echo $event["id"];?> " method="post">


<div class="row">
    <div class="col">
   
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nom :</label>
      <input type="text" class="form-control" id="exampleInputEmail1" required aria-describedby="emailHelp" name="nom"value="<?php echo $event["name"];?>">
     
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Debut :</label>
      <input type="time" class="form-control" id="exampleInputEmail1" required  aria-describedby="emailHelp "   name="start" value="<?php echo (new DateTime($event["start"]))->format('H:i');?>">
     
    </div>


    </div>
    <div class="col">
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date :</label>
      <input type="date" class="form-control" id="exampleInputEmail1" required  aria-describedby="emailHelp"  name="date" value="<?php echo (new DateTime($event["start"]))->format('Y-m-d');?>">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4" >Fin :</label>
      <input type="time" class="form-control" id="exampleInputEmail1" required   name="end" aria-describedby="emailHelp"  value="<?php echo (new DateTime($event["end"]))->format('H:i');?>">
     
    </div>
</div>
<div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4 " >Description</label>
      <textarea type="text" class="form-control" name="des" rows="4" required  value="<?php echo h($event["description"]);?>"><?php echo h($event["description"]);?></textarea>
    </div>
</div>
<br>
<button type="submite" class="btn btn-success">Modifier</button>&emsp;<a href="../php/del.php?id=<?php  echo $event["id"];?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
</form>

<?php }  ?>

