<div class="mainPlat">
<?php
include("bdd.php");

$reponse = $bdd->query('SELECT menu.nom AS menu_nom,
                               menu.prix AS menu_prix,
                               menu.id AS id_menu
                        FROM `relation`
                        LEFT JOIN menu ON `menu`.id = `relation`.id_menu
                        LEFT JOIN plat ON `plat`.id = `relation`.id_plat');

// On affiche chaque entrée ligne par ligne
while ($donnees = $reponse->fetch())
{

  $id_menu = $donnees["id_menu"];
  echo
  "<div class='menu'>
      <p class='menuTitle anna'>---Menu---</p>
      <p class='source resize'>".$donnees["menu_nom"]."</p>
      <ul>";

      $answer = $bdd->query("SELECT id_plat
                              FROM relation WHERE id_menu = '.$id_menu.'");
          while ($plat = $answer->fetch()){

            $text = $bdd->query("SELECT nom FROM plat WHERE id = '.$plat[0].'");
                var_dump($text);
                while ($affiche = $text->fetch()){
                  echo "<li>".$affiche."</li>";
                };
          };

      echo"</ul>
      <p class='prix'>".$donnees["menu_prix"]."€</p>
   </div>";
};
?>
</div>
