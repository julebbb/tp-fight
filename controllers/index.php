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

include "../views/indexVue.php";

