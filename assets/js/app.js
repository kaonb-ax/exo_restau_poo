$( document ).ready(function(){
console.log( "app.js ready!" );

$('#onglet_plat').click(function() {
  $('.mainContainer').load( "./includes/formulairePlat.php" );
});
$('#onglet_menu').click(function() {
  window.location.href = "cuisine.php";
});
// fin du doc ready
});
