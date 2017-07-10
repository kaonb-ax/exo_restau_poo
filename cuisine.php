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
    <span><a href="#" id="onglet_modif_plat" class="green">modifier/supprimer un plat</a></span>
    <span><a href="#" id="onglet_plat" class="green">Ajouter un plat</a></span>
    <span><a href="#" id="onglet_menu" class="red">Ajouter un menu</a></span>
    <span><a href="#" id="onglet_modif_menu" class="red">modifier/supprimer un menu</a></span>
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
