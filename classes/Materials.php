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

  //Function for listing materials
  public function listMaterials($params){

  }
}