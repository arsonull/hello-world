<?php
require_once("../Classes/OrderBusinessService.php");
function displayOrder($d1, $d2)
{
?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">Order Number</th>
      <th scope="col">Product</th>
      <th scope="col">Quantity</th>
      <th scope="col">Price of Product</th>
      <th scope="col">Total</th>
      <th scope="col">Date</th>
  
    </tr>
  </thead>
  <tbody>
      <?php
        $service = new orderBusinessService();
        //$orderItems = $service->getPrice($id);
        //$orderDate = $service->getDate($id);
        //$index++;
        $orderInfo = $service->getOrderInfo($d1, $d2);
          
          //for each order info that we get, it creates another row. Essentially showing each item bough, how many of that item, what order that is a part of, when that order happened,
          //and the total of that product
          foreach ($orderInfo as $o)
          {
      ?>
          <tr>
            <th scope="row"><?php echo $o[0]; ?></th>
            <td><?php echo $o[1];?></td>
            <td><?php echo $o[2];?></td>
            <td>$<?php echo $o[3];?></td>
            <td>$<?php echo $o[4];?></td>
            <td><?php echo $o[5];?></td>
          </tr>
      <?php
          }
      ?>
  </tbody>
</table>
<?php
}
?>