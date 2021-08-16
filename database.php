<?php
class Database{
  private $host = "127.0.0.1";
  private $username = "root";
  private $pwd = "";
  private $db = "radact";

  protected function connect(){
    $dsn = 'mysql:host=' .$this->host .';dbname=' .$this->db;
    $pdo = new PDO($dsn,$this->username,$this->pwd);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
?>