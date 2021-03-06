<?php

class Materials {
  private $db;

  public function __construct($database){
    $this->db = $database;
  }

  //Function for adding a material
  public function addMaterial($form){
    $columns = '';
    $values = '';
    $query_params = array();

    //loop through $form array to pull out input names
    foreach(array_keys($form) as $key){
      $columns .= $key.',';
      $values .= ':'.$key.',';
      $query_params[$key] = $form[$key];
    }

    //strip final comma out of $columns, $values
    $columns = rtrim($columns, ",");
    $values = rtrim($values, ",");

    $query = 'INSERT INTO inventory('.$columns.',active)VALUES('.$values.',1)';

    try {
      $stmt = $this->db->prepare($query);

      $result = $stmt->execute($query_params);
      $inserted = TRUE;
    } catch(PDOException $ex) {
      die('Failed to run query!'.$ex->getMessage());
    }
    return $inserted;
  }

  //Function for editing a material
  public function editMaterial($form){

  }

  //Function for deleting a material
  public function deleteMaterial($material){

  }

  //Function for getting all inventory
  public function getInventory($user){
    $output = '';

    $query = '
      SELECT
        a.id,
        a.brand,
        a.model,
        a.size,
        a.type,
        a.description,
        a.color,
        a.sex,
        a.bird,
        a.material,
        a.animal,
        a.part,
        a.qty,
        b.*
      FROM
        inventory a
      LEFT JOIN
        `inventory-categories` b
      ON
        a.category = b.id
      WHERE
        a.active = :active
      AND
        a.user = :user
    ';
    $query_params = array(
      ':active' => 1,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $category = $row['category-name'];
        $brand = $row['brand'];
        $model = $row['model'];
        $size = $row['size'];
        $type = $row['type'];
        $description = $row['description'];
        $color = $row['color'];
        $sex = $row['sex'];
        $bird = $row['bird'];
        $material = $row['material'];
        $animal = $row['animal'];
        $part = $row['part'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$size.'</td>
            <td>'.$type.'</td>
            <td>'.$description.'</td>
            <td>'.$color.'</td>
            <td>'.$sex.'</td>
            <td>'.$bird.'</td>
            <td>'.$material.'</td>
            <td>'.$animal.'</td>
            <td>'.$part.'</td>
            <td>'.$qty.'</td>
            <td><a href="editItem.php?id='.$id.'">Edit</a> | <a href="deleteItem.php?id='.$id.'">Delete</a></td>
          </tr>
        ';
      }

    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting hook inventory
  public function getHooks($user){
    $output = '';

    $query = 'SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user';
    $query_params = array(
      ':active' => 1,
      ':category' => 1,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $size = $row['size'];
        $brand = $row['brand'];
        $model = $row['model'];
        $type = $row['type'];
        $color = $row['color'];
        $material = $row['material'];
        $qty = $row['qty'];

        //generate html table output
        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$size.'</td>
            <td>'.$type.'</td>
            <td>'.$color.'</td>
            <td>'.$material.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }

    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting hook inventory
  public function getDubbing($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 2,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $description = $row['description'];
        $color = $row['color'];
        $qty = $row['qty'];

        //generate html table output
        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$description.'</td>
            <td>'.$color.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //function for getting hackle inventory
  public function getHackle($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 3,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $size = $row['size'];
        $color = $row['color'];
        $sex = $row['sex'];
        $bird = $row['bird'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$size.'</td>
            <td>'.$color.'</td>
            <td>'.$sex.'</td>
            <td>'.$bird.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //function for getting feather inventory
  public function getFeathers($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 4,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $size = $row['size'];
        $color = $row['color'];
        $bird = $row['bird'];
        $feather = $row['feather'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$size.'</td>
            <td>'.$color.'</td>
            <td>'.$bird.'</td>
            <td>'.$feather.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting thread inventory
  public function getThread($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 5,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $type = $row['type'];
        $size = $row['size'];
        $color = $row['color'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$type.'</td>
            <td>'.$size.'</td>
            <td>'.$color.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting bead inventory
  public function getBeads($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 6,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $color = $row['color'];
        $size = $row['size'];
        $material = $row['material'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$color.'</td>
            <td>'.$size.'</td>
            <td>'.$material.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting hair inventory
  public function getHair($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 7,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $animal = $row['animal'];
        $part = $row['part'];
        $color = $row['color'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$animal.'</td>
            <td>'.$part.'</td>
            <td>'.$color.'</td>
            <td>'.$qty.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for getting misc inventory
  public function getMisc($user){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category AND user = :user";
    $query_params = array(
      ':active' => 1,
      ':category' => 8,
      ':user' => $user
    );

    try {
      $stmt = $this->db->prepare($query);
      $result = $stmt->execute($query_params);

      while($row = $stmt->fetch()){
        $id = $row['id'];
        $brand = $row['brand'];
        $model = $row['model'];
        $size = $row['size'];
        $type = $row['type'];
        $description = $row['description'];
        $color = $row['color'];
        $material = $row['material'];
        $animal = $row['animal'];
        $qty = $row['qty'];

        $output .= '
          <tr>
            <td>'.$id.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
            <td>'.$size.'</td>
            <td>'.$type.'</td>
            <td>'.$description.'</td>
            <td>'.$color.'</td>
            <td>'.$material.'</td>
            <td>'.$animal.'</td>
            <td>'.$animal.'</td>
          </tr>
        ';
      }
    } catch(PDOException $ex) {
      die('Failed to run query!');
    }

    return($output);
  }

  //Function for listing materials
  public function listMaterials($params){

  }
}