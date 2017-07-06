<?php
// Nous créons une classe « Personnage ».
class plat
{
  private $_nom;
  private $_prix;
  private $_image;

  // Nous déclarons une méthode dont le seul but est d'afficher un texte.
  public function parler()
  {
    echo 'Je suis un personnage !';
  }
}
$perso = new Personnage;
$perso->parler();
?>
