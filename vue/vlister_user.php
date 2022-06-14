<div id="rechercher1">
  <h2>Liste des Clients</h2>
  <?php

  ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Role</th>
      <th scope="col">Fonction</th>
      <th scope="col">Edit</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;

    while($i<count($cl))
    {

 ?>
    <tr>
      <th scope="row"><?php echo $cl[$i]['ID']?></th>
      <td><?php echo $cl[$i]['Nom']?></td>
      <td><?php echo $cl[$i]['Role']?></td>
      <td><?php echo $cl[$i]['Fonction']?></td>
      <td><a href="../php/add_fiche.php?id=<?php echo $cl[$i]['ID']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg></a></td>

    </tr>
    <?php
        $i = $i + 1;
     }

?>

  </tbody>
</table>