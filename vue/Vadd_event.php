<?php  include('base.php'); ?>
<div class="container">
    <h3>Ajouter Evenement</h3>
<form action="../php/add.php" method="post">


<div class="row">
    <div class="col">
   
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Nom :</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="nom" placeholder="Enter Nom">
     
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Debut :</label>
      <input type="time" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp "   name="start"placeholder="HH:MM">
     
    </div>


    </div>
    <div class="col">
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Date :</label>
      <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  name="date" placeholder="Enter Nom">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4" >Fin :</label>
      <input type="time" class="form-control" id="exampleInputEmail1"  name="end" aria-describedby="emailHelp" >
     
    </div>
</div>
<div class="form-group">
      <label for="exampleInputPassword1" class="form-label mt-4 "  placeholder="Entrer une Description">Description</label>
      <textarea type="text" class="form-control" name="des" rows="4"></textarea>
    </div>
</div>
<div class="form-group">
<input type="hidden" class="form-control" id="exampleInputEmail1"  name="id" aria-describedby="emailHelp" value="<?php echo $_SESSION['id']; ?>" >
    </div>
    <br>

    <button type="submite" class="btn btn-success">AJouter</button>
</div>

</form>
</div>