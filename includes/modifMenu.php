
<div class="alignForm">
  <form class="text flex column" action="traitement_modif_menu.php" method="POST">
      <h1 class="title">modifier ou supprimer un menu !</h1>
      <label for="list"> quel menu voulez vous modifier ou supprimer ?</label>
      <select name="list" size="1">
        <?php
        include("bdd.php");
        $reponse = $bdd->query('SELECT * FROM menu');
        while ($donnees = $reponse->fetch())
        {
          echo "<option value='".$donnees["id"]."'>".$donnees["nom"]."</option>";
        };
        ?>
      </select>
      <label for="menu"> Nouveau nom menu</label>
      <input type="text" id="menu" name="menu" autofocus placeholder="découverte">
      <label for="prix">nouveau prix en €uro</label>
      <input type="text" id="prix" name="prix" value="" placeholder="35">

      <div class="choice">
        <button type="submit" name="change" value="change" class="submit" name="button">modifier</button>
        <button type="submit" id ="supp" name="supp" value="supp" class="submit" name="button">suprimer</button>
      </div>
  </form>
</div>
