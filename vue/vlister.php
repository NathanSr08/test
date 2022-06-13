<div id="rechercher1">
  <h2>Liste des Clients</h2>
  <?php

  ?>

<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nom</th>
      <th scope="col">Propriétaire</th>
      <th scope="col">Energie</th>


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
      <td><?php echo $cl[$i]['Proprio']?></td>
      <td><?php echo $cl[$i]['Energie']?></td>

    </tr>
    <?php
        $i = $i + 1;
     }

?>

  </tbody>
</table>