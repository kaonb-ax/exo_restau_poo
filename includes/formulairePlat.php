
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST" enctype="multipart/form-data">
      <h1 class="title">Ajouter un nouveau plat !</h1>
      <label for="plat">nom de votre nouveau plat</label>
      <input type="text" id="plat" name="plat" autofocus placeholder="Couscous aux lardon">
      <label for="prix">prix</label>
      <div>
        <input type="text" id="prix" name="prix" placeholder="15" style="width: 4em;">
        <span class="price">€</span>
      </div>
      <label for="image">image</label>
      <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
      <input type="file" name="image"/>
      <button type="submit" name="form_plat" value="form_plat" class="submit" name="button">Ajouter</button>
  </form>
</div>
