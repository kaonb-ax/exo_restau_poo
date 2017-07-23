
<div class="alignForm">
  <form class="text flex column" action="traitement.php" method="POST">
      <p class="selectedMenu hidden" style="text-align:center;"></p>
      <label for="list" class="showHideList" style="text-align:center;"> Choisissez un menu:</label>
      <select name="list" class="showHideList" size="1">
        <?php
        //affichage des different menu================================
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
        <label for="menu" class="smallMargin" >Menu</label>
        <div class="champ_new_menu">
          <input type="text" id="menu" name="menu" autofocus placeholder="découverte" class="smallMargin">
        </div>
        <div class="hidden_id"></div>
        <br/>
        <label for="checkbox" class="smallMargin">Plats inclus dans votre menu</label>
        <div class="checkbox" class="smallMargin">
          <?php
          //affichage des checBoxes=====================================
          //recup du tableau des ID_plat presente dans le menu==========
          $test = $bdd->prepare('SELECT GROUP_CONCAT(id_plat SEPARATOR ",") AS id_plat FROM relation WHERE id_menu =:id_menu GROUP BY id_menu');
          $test->execute(array(
              'id_menu' => $_GET['id_menu']
              ));
          while ($donnees = $test->fetch()){
            $test_tab = explode(',', $donnees["id_plat"]);
          }
          //recup liste de toutes les id_plat============
          $liste_plat = $bdd->query('SELECT * FROM plat');
          while ($donnees = $liste_plat->fetch()){
            //teste la presence de l'id dans le tableau
            if (in_array($donnees["id"], $test_tab) ) {
              echo "
              <div class='checkB'>
                <label>
                <input type='checkbox' checked name='check[]' value='".$donnees["id"]."'>
                ".$donnees["nom"]."
                </label>
              </div>";
            }else{
              echo "
              <div class='checkB'>
                <label>
                <input type='checkbox' name='check[]' value='".$donnees["id"]."'>
                ".$donnees["nom"]."
                </label>
              </div>";
            }
          }
          ?>
        </div>
        <label for="prix" class="smallMargin">Prix</label>
        <div class="smallMargin">
          <input type="text" class="inputPrix" id="prix" name="prix" class="inputPrix"
          <?php
          //récuperation du prix du menu===============================
          if(isset($_GET['id_menu'])){
            $id_menu = $_GET['id_menu'];
            $req = $bdd->prepare('SELECT prix AS prix FROM menu WHERE id = :id_menu');
            $req->execute(array(
                'id_menu' => $id_menu
                ));
                $price = $req->fetch(PDO::FETCH_ASSOC);
            echo"value='".$price['prix']."'";
          }else{
             echo"placeholder='32'";
          }

          ?>>
          <span class="price">€</span>
        </div>
        <div class="choice">
          <button type="submit" name="change_menu" value="change_menu" class="submit">modifier</button>
        </div>
      </div>
  </form>
</div>
