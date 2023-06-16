<?php
class DBConnection {
    private $host;
    private $username;
    private $password;
    private $database;
    private $connection;
  
    public function __construct($host, $username, $password, $database) {
      $this->host = $host;
      $this->username = $username;
      $this->password = $password;
      $this->database = $database;
  
      $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
  
      if ($this->connection->connect_error) {
        die("Connection failed: " . $this->connection->connect_error);
      }
    }
    public function getConnection() {
      return $this->connection;
    }
}
$dbConnection = new DBConnection('localhost', 'id20898378_scweb', 'Scweb123.', 'id20898378_scweb');


ob_start();


ob_end_flush(); 
?>
