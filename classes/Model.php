 <?php
class Model {

  private $conn;

 
  
  function __construct()
  {
    global $DB_HOST, $DB_DBNAME, $DB_USERNAME, $DB_PASSWORD;
    $this->conn = new PDO("mysql:host=".$DB_HOST.";dbname=".$DB_DBNAME, $DB_USERNAME, $DB_PASSWORD);
  }



}
?>