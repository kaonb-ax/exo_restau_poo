
<div class="alignForm">
  <form class="text flex column" action="traitementPlat.php" method="POST" enctype="multipart/form-data">
      <h1 class="title">Ajouter un nouveau plat !</h1>
      <label for="plat">nom de votre nouveau plat</label>
      <input type="text" id="plat" name="plat" autofocus placeholder="Couscous aux lardon">
      <label for="prix">prix en euros</label>
      <input type="text" id="prix" name="prix" value="" placeholder="15">
      <label for="image">image</label>
      <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
      <input type="file" name="image"/>
      <button type="submit" id="submit" class="submit" name="button">Ajouter</button>
  </form>
</div>
