 <?php 
  include("template/header.php");
?>

<section class="addform">
    <div class="">
      <h2>Ajouter un personnage :</h2>
      <?php if (!empty($send)) {
         echo "<p>" .  $send . "</p>";
      } ?>

     <form  action="index.php" method="post">
       <label for="name">Nom du personnage :</label>
       <input type="text" name="name" class="form-control">

       <input type="submit" name="envoie" class="btn btn-primary  d-block" value="Crée">
     </form>

      <p><?php echo $info;?></p>


    </div>

  </section>
  <section>
      <h3>Infos de votre personnage :</h3>
      <p>Name : <?php echo $lastCharacter->getName()?></p>
      <p>Damage : <?php echo $lastCharacter->getDamage()?></p>


      <h3>Autres personnages :</h3>
    <?php
      unset($characters[$last_key]);  
      foreach($characters as $character) {
    ?>
      <p>Name : <?php echo $character->getName(); ?></p>
      <p>Damage : <?php echo $character->getDamage(); ?></p>
      <a href="index.php?hit=<?php echo $character->getId()?>">Hit !!</a>
    <?php
    }
      include("template/footer.php")
    ?>
  </section>
  

