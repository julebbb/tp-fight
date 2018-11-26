<?php

include "../model/connect.php";
include "../views/indexVue.php";

$db = connect()->query('SELECT id, name, descript, DATE_FORMAT(deadline, "%d/%m/%Y") AS deadline FROM projects');


echo "<pre>";
print_r($db);
echo "</pre>";
 ?>
