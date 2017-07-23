
<div class="alignForm">
  <div class="paddingSup">
    <form class="text flex column" action="traitement.php" method="POST">
      <label for="list"> quel plat voulez vous modifier ou supprimer ?</label>
      <select name="list" size="1">
        <?php
        include("bdd.php");
        $reponse = $bdd->query('SELECT * FROM plat');
        while ($donnees = $reponse->fetch())
        {
          echo "<option value='".$donnees["id"]."'>".$donnees["nom"]."</option>";
        };
        ?>
      </select>
      <div class="choice">
        <button type="button" name="confirm" class="false submit red">supprimer</button>
        <button type="submit" name="supp_menu" value="supp_menu" class="true submit red hidden">Confirmé</button>
        <button type="button" name="confirm"  class="back hidden submit">Annulé</button>
      </div>
      <label for="modif_plat"> Nom</label>
      <input type="text" id="modif_plat" name="modif_plat" autofocus placeholder="découverte">
      <label for="prix">Prix</label>
      <div>
        <input type="text" id="prix" name="prix" placeholder="32" class="inputPrix">
        <span class="price">€</span>
      </div>

      <div class="choice">
        <button type="submit" name="change_plat" value="change_plat" class="submit">modifier</button>
      </div>
    </form>
  </div>
</div>
