$( document ).ready(function(){
console.log( "app.js ready!" );
// gestion des onglet de la cuisine=====================
$('#onglet_plat').click(function() {
  window.location.href = "newPlat.php";
});
$('#onglet_menu').click(function() {
  window.location.href = "cuisine.php";
});
$('#onglet_modif_menu').click(function() {
  window.location.href = "modif_menu.php";
});
$('#onglet_modif_plat').click(function() {
  window.location.href = "modif_plat.php";
});
// fin de la gestion des onglet de la cuisine============

//bouton valider sur les formulaire de suppression=======
$('.false').click(function() {
  $('.true').removeClass("hiddenTrueSupp");
  $('.false').addClass("hiddenTrueSupp");
});
//chargement dynamique des fomulaire de changement menu/plats
// $('.selectList option:selected').select(function(){
//   var id_selected = $('.selectList').val();
//   window.location.href = "modif_menu.php?getIdMenu="+id_selected;
// })



// fin du doc ready
});
