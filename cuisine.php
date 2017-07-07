<?php
require_once('./includes/header.php');
?>
<!-- gestion des onglets -->
<script type="text/javascript">
  $('.ong_cuisine').addClass("onglet_G_on");
  $('.ong_accueil').removeClass("onglet_G_on");
  $('.ong_plat').removeClass("onglet_G_on");
  $('.ong_menu').removeClass("onglet_G_on");
</script>
<!-- fin de gestion des onglets -->
<div class="cuisine">
  <div class="onglets">
    <p><a href="#" id="onglet_modif_plat" class="yellow topBurger">modifier un plat</a></p>
    <p><a href="#" id="onglet_plat" class="green">Ajouter un plat</a></p>
    <div class="tomato"></div>
    <p><a href="#" id="onglet_menu" class="brown">Ajouter un menu</a></span>
    <p><a href="#" id="onglet_modif_menu" class="yellow botBurger">modifier un menu</a></p>
  </div>
  <div class="mainContainer">
  <?php
  require_once('./includes/formulaireMenu.php');
  ?>
  </div>
</div>
<?php
require_once('./includes/footer.php');
?>
