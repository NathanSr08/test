<?php 
session_start();
if(!isset($_SESSION['id']))
{
    header('Location:../index.php');
}




include('base.php'); ?>
<div class="contain">
    <div class="container">
<form action="../php/add_user.php" method="POST">
<div class="form-group">
      <label for="exampleInputEmail1" class="form-label mt-4">Login</label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="login" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
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