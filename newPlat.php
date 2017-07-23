<?php
require_once('./includes/header.php');
?>
<script type="text/javascript">
  $('.ong_menu').removeClass("onglet_G_on");
  $('.ong_accueil').removeClass("onglet_G_on");
  $('.ong_plat').removeClass("onglet_G_on");
  $('.ong_cuisine').addClass("onglet_G_on");
</script>
<div class="menuPlat">
  <span class="anna">----------- Plats -----------</span>
  <span class="anna menuShow">-----------Menus -----------</span>
</div>
<div class="cuisine">
  <div class="onglets">
    <span><a href="#" id="onglet_plat" class="active">Ajouter</a></span>
    <span><a href="#" id="onglet_modif_plat" class="grey">modifier/supprimer</a></span>
    <div class="space"></div>
    <span class="anna hiddenMenu">-----------Menus -----------</span>
    <span><a href="#" id="onglet_menu" class="grey">Ajouter</a></span>
    <span><a href="#" id="onglet_modif_menu" class="grey">modifier/supprimer</a></span>
  </div>
  <div class="mainContainer">
  <?php
  require_once('./includes/formulairePlat.php');
  ?>
  </div>
</div>
<?php
require_once('./includes/footer.php');
?>
