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
$('.noSupp').click(function() {
  $('.true').removeClass("hidden");
  $('.back').removeClass("hidden");
  $('.false').addClass("hidden");
});
$('.back').click(function() {
  $('.false').removeClass("hidden");
  $('.true').addClass("hidden");
  $('.back').addClass("hidden");
});
//chargement dynamique des fomulaire de changement menu/plats
function $_GET(param) {
  var vars = {};
  window.location.href.replace( location.hash, '' ).replace(
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function( m, key, value ) { // callback
      vars[key] = value !== undefined ? value : '';
      }
  );

  if ( param ) {
    return vars[param] ? vars[param] : null;
  }
  return vars;
}
var id_menu = $_GET('id_menu');
var nom_menu = $_GET('nom_menu');
var nom_menu = nom_menu.replace(/%20/g, " ");
var nom_menu = nom_menu.replace(/%C3%A9/g, "é");
var nom_menu = nom_menu.replace(/%C3%A8/g, "è");
if (nom_menu !== null) {
  // nom_menu present donc on affiche les options
  console.log(nom_menu);
    $('.hiddenOption').removeClass("hidden");
    $('.showHideList').addClass("hidden");
    $('.selectedMenu').removeClass("hidden");
    $('.auto_comp').addClass("hidden");
    $('.noSupp').addClass("hidden");
    $('.champ_new_menu').html("<input type='text' id='menu' name='menu' autofocus value='"+nom_menu+"' style='margin-left:1em; margin-bottom:1em;'>");
    $('.hidden_id').html('<input type="text" id="prix" class="hidden" name="list" value="'+id_menu+'">');
}else{
  // nom_menu absent donc premiere connexion on ne touche a rien
  console.log("pas de variable dans le paramètres GET")
};



// fin du doc ready
});
