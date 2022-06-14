<?php 




include('base.php'); 
if(!isset($_SESSION['id']))
{
    header('Location:../index.php');
}
 ?>

<div class="container">
    <div class="container">
        <h3>Ajouter un User</h3>
<form action="../php/add_user.php" method="POST">
<div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Login</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="exampleSelect1" name="test" class="form-label mt-4">Type User</label>
      <select  name="test" class="form-select" id="exampleSelect1">
        <?php $i=0; while(count($type)>$i) { ?>
        <option value="<?php echo $type[$i]['ID'] ?>"><?php echo $type[$i]['Nom'] ?></option>
      
        <?php $i = $i+1; } ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Mot de passe</label>
      <input type="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="mdp" placeholder="Enter password">
     
    </div>
    <br>
    <button type="submite" class="btn btn-success">Ajouter</button>
</form>
    </div>
</div>