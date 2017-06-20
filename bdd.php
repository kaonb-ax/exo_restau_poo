<?php
//echo "salut c'est la BDD";
try {
    $bdd = new PDO('mysql:host=localhost;dbname=restaurant;charset=utf8', 'atax', 'kaonb');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //echo "__connexion OK";
}
catch(Exception $e) {
    //echo 'Exception -> ';
    var_dump($e->getMessage());
}
?>
