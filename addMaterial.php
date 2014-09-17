<?php

require_once('init.php');
$category = $_GET['cat'];

//Form handler
if(isset($_POST['submitted'])){
  $form = $_POST;
  $addMaterial = $materialsObj->addMaterial($form);
}

?>

<?php require_once('header.php'); ?>

<form action="" method="post">
  <div>

  </div>
  <input type="hidden" name="submitted" value="true">
</form>

<?php require_once('footer.php'); ?>