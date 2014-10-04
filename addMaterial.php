<?php

require_once('init.php');

//Form handler
if(isset($_POST['submitted'])){
  $form = $_POST;
  $addMaterial = $materialsObj->addMaterial($form);
}
?>

<?php require_once('header.php'); ?>

<h2>Add a new Material</h2>

<form action="" method="post" role="form">
  <div class="form-group col-md-4">
    <label for="category">Category</label>
    <select class="form-control" id="category">
      <option value=""></option>
    </select>
    <label for="brand">Brand</label>
    <input type="text" class="form-control" id="brand" name="brand" placeholder="Brand Name">
    <label for="model">Model</label>
    <input type="text" class="form-control" id="model" name="model" placeholder="Model">
    <label for="size">Size</label>
    <input type="text" class="form-control" id="size" name="size" placeholder="Size">
    <label for="type">Type</label>
    <input type="text" class="form-control" id="type" name="type" placeholder="Type">
    <label for="description">Description</label>
    <textarea id="description" name="description" class="form-control" rows="3"></textarea>
    <label for="color">Color</label>
    <input type="text" class="form-control" id="color" name="color" placeholder="Color">
    <label>Sex</label>
    <div class="radio">
      <label>
        <input type="radio" name="sex" id="sex" value="Male" checked>
        Male
      </label>
    </div>
    <div class="radio">
      <label>
        <input type="radio" name="sex" id="sex" value="Female">
        Female
      </label>
    </div>
    <label for="bird">Bird</label>
    <input type="text" class="form-control" id="bird" name="bird" placeholder="Bird">
    <label for="material">Material</label>
    <input type="text" class="form-control" id="material" name="material" placeholder="Material">
    <label for="animal">Animal</label>
    <input type="text" class="form-control" id="animal" name="animal" placeholder="Animal">
    <label for="part">Part</label>
    <input type="text" class="form-control" id="part" name="part" placeholder="Part">
    <label for="qty">Quantity</label>
    <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity on Hand">
  </div>


  <div class="form-group col-md-12">
    <input type="hidden" name="submitted" value="true">
    <input type="hidden" name="user" value="<?php print($_SESSION['user']['id']);?>">
    <button type="submit" class="btn btn-primary">Add Material</button>
  </div>
</form>

<?php require_once('footer.php'); ?>