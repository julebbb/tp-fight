<?php

include "../model/CharacterManager.php";

function loadClasse($classname){
    if(file_exists('../model/'. $classname.'.php')) {
        require '../model/'. $classname.'.php';
    }
    else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('loadClasse');

$db = Database::DB();
$characterManager = new CharacterManager($db);


$characters = $characterManager->getCharacters();

//Add a character
if (isset($_POST['name'])  AND !empty($_POST['name'])) {
    $name = strip_tags($_POST['name']);
    $check = $characterManager->checkCharacter($name);
    if ($check == 0) {
        echo "Perfect !";
        $newCharacter = new Character([
        "name" => $name,
        "damage" => 0
        ]);

        $characterManager->addCharacter($newCharacter);

    }
    
}

//Fight character
if (isset($_GET['hit'])  AND !empty($_GET['hit'])) {
    $hit = (int) $_GET['hit'];

    $characterManager->fight($hit);
    header('Location: index.php');
    
}
include "../views/indexVue.php";

