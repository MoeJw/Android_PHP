<?php
class Customer{
  
    // database connection and table name
    private $conn;
    private $table_name = "products";
  
    // object properties
    public $ID;
    public $Name;
  
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }
    function read(){
  
        // select all query
        $query = "SELECT * FROM `customer`";
      
        // prepare query statement
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
    function findCustomer ($name){
        $query = "SELECT * FROM `customer` where Name='".$name."'";
        $stmt = $this->conn->prepare($query);
      
        // execute query
        $stmt->execute();
      
        return $stmt;
    }
}

?>