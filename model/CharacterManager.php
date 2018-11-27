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

  public function fight($id) {
    $query = $this->getDb()->prepare('UPDATE characters SET damage = damage + 5 WHERE id=?');
    $query->execute(array($id));
    return header('Location: index.php');

  }

  public function delete($id) {
    $query = $this->getDb()->prepare('DELETE FROM characters WHERE id =? AND damage >= 100');
    $query->execute(array($id));
    return header('Location: index.php');
    
  }
}