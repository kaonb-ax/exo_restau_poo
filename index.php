<?php
require_once('./includes/header.php');
?>
<!-- gestion des onglets -->
<script type="text/javascript">
  $('.ong_cuisine').removeClass("onglet_G_on");
  $('.ong_accueil').addClass("onglet_G_on");
  $('.ong_plat').removeClass("onglet_G_on");
  $('.ong_menu').removeClass("onglet_G_on");
</script>
<!-- fin de gestion des onglets -->
<div class="mainContainer">
<?php
require_once('./includes/accueil.php');
require_once('./includes/footer.php');
?>
