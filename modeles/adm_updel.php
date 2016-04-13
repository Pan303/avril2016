<?php
//var_dump($_SESSION);
// si on peut rien faire
if (!($_SESSION['modifietous'] || $_SESSION['modifie'] || $_SESSION['supprimetous'] || $_SESSION['supprime'])) {
    header("Location: ./");

// si on peut modifier ou supprimer les articles de tout le monde
} elseif ($_SESSION['modifietous'] || $_SESSION['supprimetous']) {
    $where = "";
// si on peut modifier ou supprimer ses articles
} else {
    // pour sélectionner que les articles de l'utilisateur
    $idutil = $_SESSION['idutil'];
    $where = "WHERE h.utilisateur_id = $idutil";
}


$sql = "SELECT a.id, a.titre,
              (SELECT GROUP_CONCAT(uu.lelogin SEPARATOR '|||') AS login
                FROM utilisateur uu 
                INNER JOIN article_has_utilisateur hh
                ON uu.id = hh.utilisateur_id
                WHERE a.id = hh.article_id       
        ) AS login  ,
        SUBSTRING(a.texte,1 ,300)AS letexte, a.ladate
       FROM article a
       INNER JOIN article_has_utilisateur h
       ON a.id = h.article_id
       INNER JOIN utilisateur u
        ON u.id = h.utilisateur_id
        $where
        GROUP BY a.id
        ORDER BY a.id DESC
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
