
<div class="alignForm">
  <form class="text flex column" action="traitementMenu.php" method="POST">
      <h1 class="title">Ajouter un nouveau menu !</h1>
      <label for="menu">Menu</label>
      <input type="text" id="menu" name="menu" autofocus placeholder="découverte">
      <label for="prix">prix en euros</label>
      <input type="text" id="prix" name="prix" value="" placeholder="35">
      <label for="image">choisissez le plat de votre menu</label>
      <select name="id" size="3">
        <?php
        include("bdd.php");
        $reponse = $bdd->query('SELECT * FROM plat');
        while ($donnees = $reponse->fetch())
        {
          echo "<option value='".$donnees["id"]."'>".$donnees["nom"]."</option>";
        };
        ?>
      </select>
      <button type="submit" id="submit" class="submit" name="button">Ajouter</button>
  </form>
</div>
