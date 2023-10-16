<?php
  class DataBase {
    private static $instance;
    private $connection;

    private $host = 'localhost';
    private $port = '3306';
    private $dbname = 'test';
    private $user = 'root';
    private $password = '';

    private function __construct() {
      $this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname, $this->port);
      if ($this->connection->connect_error) {
        die("Ошибка подключения: " . $this->connection->connect_error);
      }
      echo $this->connection->host_info;
    }

    public static function getInstance(){
      if (self::$instance === null) {
        self::$instance = new DataBase();
      }
      return self::$instance;
    }

    private function __clone() {}
  }

  Database::getInstance();
?>