<?php

class Database {

  public $connection;

  public $statement;

  public function __construct($config, $username = 'root', $password = '123456'){

    $dsn = 'mysql:' . http_build_query($config, '', ';');

    $this->connection = new PDO($dsn, $username, $password, [
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
  }

  public function query($query, $params = []){

    $this->statement = $this->connection->prepare($query);
    
    $this->statement->execute($params);
    
    return $this;
  }

  public function find(){
    return $this->statement->fetch();
  }

  public function findAll() {
    return $this->statement->fetchAll();
  }

  public function findOrFail() {
    $results = $this->statement->fetch();

    if (!$results) {
      abort();
    }

    return $results;
  }

}

?>