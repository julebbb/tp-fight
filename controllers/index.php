<?php

include "../model/CharacterManager.php";

$info = null;

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
        $newCharacter = new Character([
        "name" => $name,
        "damage" => 0
        ]);

        $characterManager->addCharacter($newCharacter);

        $info = "Votre personnage a bien été crée !";
        header('Refresh: 5;url=index.php');
    } else {
        $info = "Le nom du personnage est déjà pris !";
    }
    
}

//Fight character
if (isset($_GET['hit'])  AND !empty($_GET['hit'])) {
    $hit = (int) $_GET['hit'];
    $info = "Vous frappez !";
    $characterManager->fight($hit);
    $characterManager->delete($hit);
    
}

$keys = array_keys($characters);
$last_key = $keys[count($keys)-1];
$lastCharacter = $characters[$last_key];

include "../views/indexVue.php";

