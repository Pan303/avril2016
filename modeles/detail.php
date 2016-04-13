<?php
$sql = "SELECT a.id, a.letitre,
GROUP_CONCAT(u.lelogin SEPARATOR '|||' )AS login, a.ladesc, a.ladate
       FROM article a
       INNER JOIN article_has_rubrique ahr
       ON a.id = ahr.article_id
       INNER JOIN util u
        ON u.id = ahr.util_id
        WHERE a.id = $idarticle

       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_assoc($req_article);
//var_dump($tab_article);
if(empty($tab_article['id'])){
     $erreur = "Cet article n'existe plus";
}