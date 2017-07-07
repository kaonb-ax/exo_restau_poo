<?php
require_once('./includes/header.php');
?>
<!-- gestion des onglets -->
<script type="text/javascript">
  $('.ong_cuisine').removeClass("onglet_G_on");
  $('.ong_accueil').removeClass("onglet_G_on");
  $('.ong_plat').removeClass("onglet_G_on");
  $('.ong_menu').addClass("onglet_G_on");
</script>
<!-- fin de gestion des onglets -->
<div class="mainContainer">
<?php
require_once('./includes/midMenus.php');
?>
</div>
<?php
require_once('./includes/footer.php');
?>
