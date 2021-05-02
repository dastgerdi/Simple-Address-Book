<?php

class DB{

  protected static $connection;

  protected static $config = array (
    "host" => "localhost",
    "username" => "root",
    "password" => "",
    "dbname" => "address_book_db"
  );

  public function connect() {   
    if(!isset(self::$connection)) {
        self::$connection = new mysqli(self::$config['host'],self::$config['username'],self::$config['password'],self::$config['dbname']);
    }
    if(self::$connection === false) {
        return false;
    }
    return self::$connection;
  }

  private function query($query) {
    $connection = $this -> connect();
    $result = $connection -> query("SET NAMES 'utf8'");
    $result = $connection -> query($query);
    return $result;
  }

  private function select($table,$whereClause = '',$joinClause = '',$desc = false){
    $select_query = "SELECT * FROM $table";
    if($joinClause != ''){
      $select_query .= " JOIN $joinClause";
    }
    if($whereClause != ''){
      $select_query .= " WHERE $whereClause";
    }
    if($desc === false){
      
    }else{
      $select_query .= " " . $desc;
    }
    $result = $this -> query($select_query);
    if($result === false){
      return false;
    }
    if(mysqli_num_rows($result) > 0){
      while ($row = $result -> fetch_assoc()) {
        $rows[] = $row;
      }
      return $rows;
    }else{
      return 'No data';
    } 
  }

  private function insert($table,$firstname,$name,$email,$street,$zipcode,$city){
    $insert_query = "INSERT INTO $table (firstname, name, email, street, zip_code, city_id) VALUES('$firstname' ,'$name', '$email', '$street', '$zipcode', $city)";
    $result = $this -> query($insert_query);
    return $result;
  }

  private function update($table,$updateClause,$whereClause){
    $update_query = "UPDATE $table SET $updateClause WHERE $whereClause";
    $result = $this -> query($update_query);
    return $result;
  }

  public function insert_address($firstname,$name,$email,$street,$zipcode,$city){
    $result = $this -> insert('address_book_tbl',$firstname,$name,$email,$street,$zipcode,$city);
    return $result;
  }

  public function select_cities(){
    $result = $this -> select('cities_tbl');
    return $result;
  }

  public function select_addresses(){
    $result = $this -> select('address_book_tbl','','cities_tbl ON address_book_tbl.city_id = cities_tbl.city_id',"ORDER By address_book_tbl.user_id DESC");
    return $result;
  }

  public function update_address($id,$firstname,$name,$email,$street,$zipcode,$city_id){
    $result = $this -> update('address_book_tbl',"firstname='$firstname' ,name='$name' ,email='$email' ,street='$street' ,zip_code='$zipcode' ,city_id=$city_id","user_id=$id");
    return $result;
  }

}

?>
