 <?php 
  include("template/header.php");

 foreach($characters as $character) {
?>
    <p><?php echo $character->getName(); ?></p>
    <p><?php echo $character->getDamage(); ?></p>
<?php
 }
   include("template/footer.php")
?>
