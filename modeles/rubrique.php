<?php
$sql = "SELECT r.id AS idrubrique,a.id AS idarticle,a.letitre,a.ladate,SUBSTRING(a.ladesc,1,200)AS ladesc,a.util_id,r.lintitule AS lint,u.lelogin AS lelogin

FROM article a

INNER JOIN article_has_rubrique ahr
ON a.id = ahr.article_id

INNER JOIN rubrique r
ON r.id = ahr.rubrique_id

LEFT JOIN util u
ON  u.id = ahr.article_id

WHERE r.id = $idrubrique

ORDER BY a.ladate DESC
       ";
$req_rubrique = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_rubrique = mysqli_fetch_all($req_rubrique, MYSQLI_ASSOC);

$nb = mysqli_num_rows($req_rubrique);



