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

  public function addCharacter(Character $character) {
    $query = $this->getDb()->prepare('INSERT INTO characters(name, damage) VALUES (:name, :damage)');
    $query->execute([
      "name" => $character->getName(),
      "damage" => $character->getDamage()
    ]);

    return header('Location: index.php');

  }

  public function checkCharacter($name) {
    $query = $this->getDb()->prepare('SELECT id FROM characters WHERE name=?');
    $query->execute(array($name));
    
    $search = $query->fetch();
    return $search;
  }
}