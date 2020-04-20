<?php

function displayKart($kart){

?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price of Product</th>
  
    </tr>
  </thead>
  <tbody>
      <?php 
 
        foreach($kart as $column){
      ?>
          <tr>
            <th scope="row"><?php echo $column[0]; ?></th>
            <td><?php echo $column[1];?></td>
            <td><?php echo $column[2];?></td>
          </tr>
      <?php                       
        }
      ?>
  </tbody>
</table>
<?php
}
?>