<?php

include "../model/CharacterManager.php";

function chargerClasse($classname){
    if(file_exists('../model/'. $classname.'.php')) {
        require '../model/'. $classname.'.php';
    }
    else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

$db = Database::DB();
$characterManager = new CharacterManager($db);


$characters = $characterManager->getCharacters();

if (isset($_POST['name'])  AND !empty($_POST['name'])) {
    $name = strip_tags($_POST['name']);
    echo $name;
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
include "../views/indexVue.php";

