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
<div class="menuPlat">
  <span class="anna">----------- Plats -----------</span>
  <span class="anna menuShow">-----------Menus -----------</span>
</div>
<div class="cuisine">
  <div class="onglets">
    <span><a href="#" id="onglet_plat" class="grey ">Ajouter</a></span>
    <span><a href="#" id="onglet_modif_plat" class="grey ">modifier/supprimer</a></span>
    <div class="space"></div>
    <span class="anna hiddenMenu">-----------Menus -----------</span>
    <span><a href="#" id="onglet_menu" class="active ">Ajouter</a></span>
    <span><a href="#" id="onglet_modif_menu" class="grey ">modifier/supprimer</a></span>
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
