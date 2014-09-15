<?php

require_once('init.php');

//get hook inventory
$hooks = $materialsObj->getHooks($_SESSION['user']['id']);

//get dubbing inventory
$dubbing = $materialsObj->getDubbing($_SESSION['user']['id']);

//get hackle inventory
$hackle = $materialsObj->getHackle($_SESSION['user']['id']);

//get feathers inventory
$feathers = $materialsObj->getFeathers($_SESSION['user']['id']);

//get thread inventory
$thread = $materialsObj->getThread($_SESSION['user']['id']);

//get bead inventory
$beads = $materialsObj->getBeads($_SESSION['user']['id']);

//get hair inventory
$hair = $materialsObj->getHair($_SESSION['user']['id']);

//get misc inventory
$misc = $materialsObj->getMisc($_SESSION['user']['id']);

?>

<?php require_once('header.php'); ?>

<div id="hookInventory">
  <h2>Hooks</h2>
  <p><a href="addMaterial.php?cat=1">Add New</a></p>
  <table border="1">
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
  <p><a href="addMaterial.php?cat=2">Add New</a></p>
  <table border="1">
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
  <p><a href="addMaterial.php?cat=3">Add New</a></p>
  <table border="1">
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Size</th>
      <th>Color</th>
      <th>Sex</th>
      <th>Bird</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($hackle); ?>
    </tbody>
  </table>
</div>

<div id="otherFeatherInventory">
  <h2>Other Feathers</h2>
  <p><a href="addMaterial.php?cat=4">Add New</a></p>
  <table border="1">
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
  <p><a href="addMaterial.php?cat=5">Add New</a></p>
  <table border="1">
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Type</th>
      <th>Size</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($thread); ?>
    </tbody>
  </table>
</div>

<div id="beadInventory">
  <h2>Beads</h2>
  <p><a href="addMaterial.php?cat=6">Add New</a></p>
  <table border="1">
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Color</th>
      <th>Size</th>
      <th>Material</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($beads); ?>
    </tbody>
  </table>
</div>

<div id="hairInventory">
  <h2>Hair</h2>
  <p><a href="addMaterial.php?cat=7">Add New</a></p>
  <table border="1">
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Animal</th>
      <th>Part</th>
      <th>Color</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($hair); ?>
    </tbody>
  </table>
</div>

<div id="miscInventory">
  <h2>Other Inventory</h2>
  <p><a href="addMaterial.php?cat=8">Add New</a></p>
  <table border="1">
    <thead>
      <th>ID</th>
      <th>Brand</th>
      <th>Model</th>
      <th>Size</th>
      <th>Type</th>
      <th>Description</th>
      <th>Color</th>
      <th>Material</th>
      <th>Animal</th>
      <th>Qty</th>
    </thead>
    <tbody>
      <?php print($misc); ?>
    </tbody>
  </table>
</div>

<?php require_once('footer.php'); ?>