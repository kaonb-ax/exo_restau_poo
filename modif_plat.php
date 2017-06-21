<?php
require_once('./includes/header.php');
?>
<div class="cuisine">
  <div class="onglets">
    <p><a href="#" id="onglet_modif_plat" class="yellow topBurger">modifier un plat</a></p>
    <p><a href="#" id="onglet_plat" class="green">Ajouter un plat</a></p>
    <p><a href="#" id="onglet_menu" class="brown">Ajouter un menu</a></span>
    <p><a href="#" id="onglet_modif_menu" class="yellow botBurger">modifier un menu</a></p>
  </div>
  <div class="mainContainer">
  <?php
  require_once('./includes/modifPlat.php');
  ?>
  </div>
</div>
<?php
require_once('./includes/footer.php');
?>
