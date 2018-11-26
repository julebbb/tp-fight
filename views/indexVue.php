 <?php 
  include("template/header.php");
?>

<section class="addform">
    <div class="">
      <h4>Ajouter un personnage :</h4>
      <?php if (!empty($send)) {
         echo "<p>" .  $send . "</p>";
      } ?>

     <form  action="index.php" method="post">
       <label for="name">Nom du personnage :</label>
       <input type="text" name="name" class="form-control">

       <input type="submit" name="envoie" class="btn btn-primary  d-block" value="Crée">
     </form>

    </div>

  </section>
<?php

 foreach($characters as $character) {
?>
    <p><?php echo $character->getName(); ?></p>
    <p><?php echo $character->getDamage(); ?></p>
    <a href="index.php?hit=<?php echo $character->getId()?>">Hit !!</a>
<?php
 }
   include("template/footer.php")
?>
