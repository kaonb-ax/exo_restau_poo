<div class="alignForm">
  <form class="text flex column" action="traitementPlat.php" method="POST">
      <h1 class="title">Ajouter un nouveau plat !</h1>
      <label for="plat">nom de votre nouveau plat</label>
      <input type="text" id="plat" name="plat" autofocus placeholder="Couscous aux lardon">
      <label for="prix">prix</label>
      <input type="text" id="prix" name="prix" value="" placeholder="150€">
      <label for="image">image</label>
      <input type="file" name="image" placeholder="image du plat" />
      <button type="submit" id="submit" class="submit" name="button">Ajouter</button>
  </form>
</div>
