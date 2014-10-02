<?php

require_once('init.php');

//Form handler
if(isset($_POST['submitted'])){
  $form = $_POST;
  $addMaterial = $materialsObj->addMaterial($form);
}
?>

<?php require_once('header.php'); ?>

<form action="" method="post">
  
  <input type="hidden" name="submitted" value="true">
  <input type="hidden" name="user" value="<?php print($_SESSION['user']['id']);?>">
  <button type="submit" class="btn btn-primary">Add Material</button>
</form>

<?php require_once('footer.php'); ?>