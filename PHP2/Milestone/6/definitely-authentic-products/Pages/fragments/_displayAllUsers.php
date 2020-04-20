<?php

function displayAllUsers($users){

?>
<table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Email</th>
      <th scope="col">Username</th>
      <th scope="col">Delete</th>
        <th scope="col">Edit</th>   
    </tr>
  </thead>
  <tbody>
      <?php 
 
        foreach($users as $column){
      ?>
          <tr>
            <th scope="row"><?php echo $column[0]; ?></th>
            <td><?php echo $column[1];?></td>
            <td><?php echo $column[2];?></td>
            <td><a href="Handlers/deletehandler.php?ID=<?php echo $column[0]; ?>">DELETE</a></td>
            <td><a href="register.php?email=<?php echo $column[1]?>&password=<?php echo $column[3]?>">EDIT</a></td>
          </tr>
      <?php                       
        }
      ?>
  </tbody>
</table>
<a href='../Pages/register.php'>Add User</a>
<?php
}
?>
