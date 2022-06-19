<!DOCTYPE html>
<!-- <?php session_start(); ?> -->
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
  <a class="navbar-brand" href="../index.php">Aganda</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <?php if(isset($_SESSION['role'])) { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Leads</a>
          <div class="dropdown-menu">
          <?php if($_SESSION['role']=="ADMIN") { ?>
            <a class="dropdown-item" href="php/add_csv.php">Ajouter</a>
            <a class="dropdown-item" href="php/liste_csv.php">lister all</a>
            <?php } ?>
            <a class="dropdown-item" href="php/my_leads.php">Mes leads</a>
        
           
        </li>
        <?php if($_SESSION['role']=="ADMIN") { ?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Users</a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="../php/add_user.php">Ajouter</a>
            <a class="dropdown-item" href="../php/lister_user.php">View all</a>
           
        </li>
  <?php } ?>
      <?php } ?>
      <?php if(isset($_SESSION['id'])) { ?>
      <a class="nav-item nav-link" href="../php/logout.php">logout</a>
      <?php }  ?>
     
     
      
    </div>
    
  </div>
</nav>