
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST">
      <h1 class="title">modifier ou supprimer un plat !</h1>
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
        <button type="submit" name="supp_plat" value="supp_plat" class="submit red">suprimer</button>
      </div>
      <label for="modif_plat"> Nouveau nom du plat</label>
      <input type="text" id="modif_plat" name="modif_plat" autofocus placeholder="découverte">
      <label for="prix">nouveau prix</label>
      <div>
        <input type="text" id="prix" name="prix" placeholder="32" style="width: 4em;">
        <span class="price">€</span>
      </div>

      <div class="choice">
        <button type="submit" name="change_plat" value="change_plat" class="submit">modifier</button>
      </div>
  </form>
</div>
