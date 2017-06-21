$( document ).ready(function(){
console.log( "app.js ready!" );

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
$('#supp').click(function() {
var r = confirm("êtes vous sur de vouloir supprimer ? 'ne marche pas encore'")
});
// fin du doc ready
});
