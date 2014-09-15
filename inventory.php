<?php

require_once('init.php');

//get hook inventory
$hooks = $materialsObj->getHooks();

//get dubbing inventory
$dubbing = $materialsObj->getDubbing();

//get hackle inventory
$hackle = $materialsObj->getHackle();

//get feathers inventory
$feathers = $materialsObj->getFeathers();

//get thread inventory
$thread = $materialsObj->getThread();

//get bead inventory
$beads = $materialsObj->getBeads();

//get hair inventory
$hair = $materialsObj->getHair();

//get misc inventory
$misc = $materialsObj->getMisc();

?>

<?php require_once('header.php'); ?>

<div id="hookInventory">
  <h2>Hooks</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Size</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Type</th>
      <th>Color</th>
      <th>Material</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($hooks); ?>
    </tbody>
  </table>
</div>

<div id="dubbingInventory">
  <h2>Dubbing</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Type</th>
      <th>Natural/Synthetic</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($dubbing); ?>
    </tbody>
  </table>
</div>

<div id="hackleInventory">
  <h2>Hackle</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Sex</th>
      <th>Size</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($hackle); ?>
    </tbody>
  </table>
</div>

<div id="otherFeatherInventory">
  <h2>Other Feathers</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Size</th>
      <th>Color</th>
      <th>Bird</th>
      <th>Feather</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($feathers); ?>
    </tbody>
  </table>
</div>

<div id="threadInventory">
  <h2>Thread</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Size</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

<div id="beadInventory">
  <h2>Beads</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Type</th>
      <th>Material</th>
      <th>Weight</th>
      <th>Size</th>
      <th>Qty</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

<div id="hairInventory">
  <h2>Hair</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Animal</th>
      <th>Part</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

<div id="miscInventory">
  <h2>Other Inventory</h2>
  <table>
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Category</th>
      <th>Size</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>

    </tbody>
  </table>
</div>

<?php require_once('footer.php'); ?>