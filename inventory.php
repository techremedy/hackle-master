<?php

require_once('init.php');

//get inventory
$inventory = $materialsObj->getInventory($_SESSION['user']['id']);

?>

<?php require_once('header.php'); ?>

<div id="inventory">
  <h2>Inventory [Add New Item]</h2>
  <table id="inventoryTable" class="display" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>ID</th>
        <th>Brand</th>
        <th>Model</th>
        <th>Size</th>
        <th>Type</th>
        <th>Description</th>
        <th>Color</th>
        <th>Sex</th>
        <th>Bird</th>
        <th>Material</th>
        <th>Animal</th>
        <th>Part</th>
        <th>Qty</th>
        <th>&nbsp;</th>
      </tr>
    </thead>
    <tbody>
      <?php print($inventory); ?>
    </tbody>
  </table>
</div>

<?php require_once('footer.php'); ?>