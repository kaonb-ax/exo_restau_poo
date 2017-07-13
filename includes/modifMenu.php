
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST">
      <h1 class="title">modifier ou supprimer un menu !</h1>
      <p class="selectedMenu hidden" style="text-align:center;"></p>
      <label for="list" class="showHideList"> Choisissez un menu:</label>
      <select name="list" class="showHideList" size="1">
        <?php
        require_once("bdd.php");
        $reponse = $bdd->query('SELECT * FROM menu');
        while ($donnees = $reponse->fetch())
        {
          echo "<option class='selectList showHideList' value='".$donnees["id"]."'>".$donnees["nom"]."</option>";
        };
        ?>
      </select>
      <div class="choice">
        <button type="submit" name="auto_completion_menu" class="auto_comp false submit" value = "auto_completion_menu">modifier</button>
        <button type="button" name="confirm" class="noSupp false submit red">supprimer</button>
        <button type="submit" name="supp_menu" value="supp_menu" class="true submit red hidden">Confirmé</button>
        <button type="button" name="confirm"  class="noSupp back hidden submit">Annulé</button>
      </div>
      <div class="hiddenOption hidden">
        <label for="menu" style="margin-left:1em;"> Nouveau nom menu</label>
        <div class="champ_new_menu">
          <input type="text" id="menu" name="menu" autofocus placeholder="découverte" style="margin-left:1em; margin-bottom:1em;">
        </div>
        <div class="hidden_id"></div>
        <br/>
        <label for="checkbox" style="margin-left:1em;">Choisissez les plats inclus dans votre menu</label>
        <div class="checkbox" style="margin-left:1em; margin-bottom:1em;">
          <?php
          include("bdd.php");
          $reponse = $bdd->query('SELECT * FROM plat');
          while ($donnees = $reponse->fetch())
          {
            echo "<div class='checkB'>
            <label>
            <input type='checkbox' name='check[]' value='".$donnees["id"]."'>
            ".$donnees["nom"]."
            </label>
            </div>";
          };
          ?>
        </div>
        <label for="prix" style="margin-left:1em;">nouveau prix</label>
        <div style="margin-left:1em;">
          <input type="text" id="prix" name="prix" style="width: 4em;" placeholder="32">
          <span class="price">€</span>
        </div>
        <div class="choice">
          <button type="submit" name="change_menu" value="change_menu" class="submit">modifier</button>
        </div>
      </div>
  </form>
</div>
