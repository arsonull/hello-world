<?php
require_once("../Classes/OrderBusinessService.php");
function displayOrder($orders)
{
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price of Product</th>
      <th scope="col">Total</th>
  
    </tr>
  </thead>
  <tbody>
      <?php
        $service = new orderBusinessService();
        $index = 0;
        $total = 0;
        $temptotal = 0;
        foreach($orders as $id){
          $orderItems[$index] = $service->getPrice($id);
          $orderDate[$index] = $service->getDate($id);
          $index++;
        }
 
        foreach($orderItems as $column){
            $total += $column[3];
            
      ?>
          <tr>
            <th scope="row"><?php echo $column[0]; ?></th>
            <td><?php echo $column[1];?></td>
            <td><?php echo $column[2];?></td>
            <td>$<?php echo $column[3];?></td>
          </tr>
      <?php    
        $total = $temptotal + $total;

        }
      ?>
            <tr>
            <th></th>
            <td></td>
            <td><?php echo $total;?></td>
            </tr>
  </tbody>
</table>
<?php
}
?>