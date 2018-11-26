<?php

class CharacterManager {
    private $_db;

     public function __construct(PDO $db) {
    $this->setDb($db);
  }

  public function getDb() {
    return $this->_db;
  }

  public function setDb(PDO $db) {
    $this->_db = $db;
    return $this;
  }

  public function getCharacters() {
    $arrayOfCharacters = [];

    $query = $this->getDb()->query('SELECT * FROM characters');
    $characters = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($characters as $character) {
      $arrayOfCharacters[] = new Character($character);
    }

    return $arrayOfCharacters;
  }
}