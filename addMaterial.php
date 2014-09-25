<?php

require_once('init.php');

//Form handler
if(isset($_POST['submitted'])){
  $form = $_POST;
  $addMaterial = $materialsObj->addMaterial($form);
}

$category = $_GET['cat'];

if(!is_numeric($category)){
  //redirect non-numerics back to index
  header("Location: index.php");
  die();
}

//fetch appropriate form for category
$form = $materialsObj->getAddMaterialForm($category);

?>

<?php require_once('header.php'); ?>

<form action="" method="post">
  
  <?php print($form); ?>

  <input type="hidden" name="submitted" value="true">
  <input type="hidden" name="user" value="<?php print($_SESSION['user']['id']);?>">
  <input type="hidden" name="category" value="<?php print($category);?>">
  <input type="submit" value="Add Material">
</form>

<?php require_once('footer.php'); ?>