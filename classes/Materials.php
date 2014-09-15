<?php

class Materials {
  private $db;

  public function __construct($database){
    $this->db = $database;
  }

  //Function for adding a material
  public function addMaterial(){

  }

  //Function for editing a material
  public function editMaterial($form){

  }

  //Function for deleting a material
  public function deleteMaterial($material){

  }

  //Function for getting hook inventory
  public function getHooks(){
    $output = '';

    $query = 'SELECT * FROM inventory WHERE active = :active AND category = :category';
    $query_params = array(
      ':active' => 1,
      ':category' => 1
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
            <td>'.$size.'</td>
            <td>'.$brand.'</td>
            <td>'.$model.'</td>
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
  public function getDubbing(){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category";
    $query_params = array(
      ':active' => 1,
      ':category' => 2
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
  public function getHackle(){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category";
    $query_params = array(
      ':active' => 1,
      ':category' => 3
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
  public function getFeathers(){
    $output = '';

    $query = "SELECT * FROM inventory WHERE active = :active AND category = :category";
    $query_params = array(
      ':active' => 1,
      ':category' => 4
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
  public function getThread(){

  }

  //Function for getting bead inventory
  public function getBeads(){

  }

  //Function for getting hair inventory
  public function getHair(){

  }

  //Function for getting misc inventory
  public function getMisc(){

  }

  //Function for listing materials
  public function listMaterials($params){

  }
}