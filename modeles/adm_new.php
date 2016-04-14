<?php
// si on a pas le droit d'écrire un article
if($_SESSION['ecrit']==false){
    // redirection
    header("Location: ./");
}

// si on a envoyé pas envoyé le formulaire

if(empty($_POST)) {
    // on sélectionne tous les utilisateurs qui peuvent écrire un article
    $sql = "SELECT id, lelogin FROM util WHERE ecrit=1;";

    $recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    $tab_util = mysqli_fetch_all($recup_util,MYSQLI_ASSOC);



}else{


    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $ladesc = htmlspecialchars(strip_tags(trim($_POST['ladesc'])),ENT_QUOTES);
    $ladate = $_POST['ladate'];

    $sql = "INSERT INTO article (letitre,ladesc,ladate)
            VALUES ('$letitre','$ladesc','$ladate')";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // récupération de l'id de l'article
    $idarticle = mysqli_insert_id($mysqli);

    $sql = "INSERT INTO article_has_rubrique (article_id, rubrique_id) VALUES ";
    foreach($_POST['util'] as $util){
        $sql .= "($idarticle,$util),";
    }
    $sql = substr($sql, 0, -1);

    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article inséré'
    $article_insere = "Votre article « $letitre » est inséré, merci! ";
}
