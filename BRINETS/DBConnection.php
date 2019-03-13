<?php
class DBConnection {
  const DB_HOST = 'localhost';
  const DB_NAME = 'BAS_BRINETS';
  const DB_USER = 'root';
  const DB_PASSWORD = '';
  public function __construct() {
    $constr = sprintf("mysql:host=%s;dbname=%s;charset=utf8", self::DB_HOST, self::DB_NAME);
    try {
      $this->pdo = new PDO($constr, self::DB_USER, self::DB_PASSWORD);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
  }

  public function __destruct() {
    $this->pdo = null;
  }
}