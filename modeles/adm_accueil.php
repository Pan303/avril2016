<?php
/*
$sql = "SELECT a.id, a.titre,
GROUP_CONCAT(u.lelogin SEPARATOR '|||' )AS login, SUBSTRING(a.texte,1 ,100)AS letexte, a.ladate
       FROM article a
       INNER JOIN article_has_utilisateur h
       ON a.id = h.article_id
       INNER JOIN utilisateur u
        ON u.id = h.utilisateur_id
        GROUP BY a.id

       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);
//var_dump($tab_article);

$nb = mysqli_num_rows($req_article);
*/