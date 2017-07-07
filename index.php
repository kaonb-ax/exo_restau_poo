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
// require_once('./includes/');
?>
<p  style="text-align: center; color:red; font-size:40px;">WELCOME TO EAT OR DIE <p style="text-align: center; color:red; font-size:40px;">Les crêpes bretonnes ça tue des mouettes en plein vol !</p>
</div>
<?php
require_once('./includes/footer.php');
?>
