<div id="rechercher1">
  <h2>Liste des Clients</h2>
  <?php

  ?>

<table class="table">
  <thead>
    <tr>
  
      <th scope="col">Nom</th>
      <th scope="col">Propriétaire</th>
      <th scope="col">Energie</th>
      <th scope="col">Fiches</th>


    </tr>
  </thead>
  <tbody>
  <?php
    $i = 0;

    while($i<count($cl))
    {

 ?>
    <tr>
     
      <td><?php echo $cl[$i]['Nom']?></td>
      <td><?php echo $cl[$i]['Proprio']?></td>
      <td><?php echo $cl[$i]['Energie']?></td>
      <td><a href="../php/fiche.php?id=<?php echo $cl[$i]['ID']; ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
  <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
</svg></a></td>

    </tr>
    <?php
        $i = $i + 1;
     }

?>

  </tbody>
</table>