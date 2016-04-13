<?php
// si on a pas le droit d'écrire un article
if($_SESSION['ecrit']==false){
    // redirection
    header("Location: ./");
}

// si on a envoyé pas envoyé le formulaire

if(empty($_POST)) {
    // on sélectionne tous les utilisateurs qui peuvent écrire un article
    $sql = "SELECT id, lelogin FROM utilisateur WHERE ecrit=1;";

    $recup_util = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    $tab_util = mysqli_fetch_all($recup_util,MYSQLI_ASSOC);
    //var_dump($tab_util);

    // formulaire envoyé
}else{


    $letitre = htmlspecialchars(strip_tags(trim($_POST['letitre'])),ENT_QUOTES);
    $letexte = htmlspecialchars(strip_tags(trim($_POST['letexte'])),ENT_QUOTES);
    $date = $_POST['ladate'];

    $sql = "INSERT INTO article (titre,texte,ladate)
            VALUES ('$letitre','$letexte','$date')";
    // exécution de la requête
    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // récupération de l'id de l'article
    $idarticle = mysqli_insert_id($mysqli);

    $sql = "INSERT INTO article_has_utilisateur (article_id, utilisateur_id) VALUES ";
    foreach($_POST['auteur'] as $auteur){
        $sql .= "($idarticle,$auteur),";
    }
    $sql = substr($sql, 0, -1);

    mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));

    // création de la variable pour afficher 'article inséré'
    $article_insere = "Votre article « $letitre » est inséré, merci! ";
}
