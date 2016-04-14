<?php

$sql = "SELECT a.letitre, u.lelogin
        FROM article a
        INNER JOIN util u
        ON a.util_id = u.id

       ";
$req_article = mysqli_query($mysqli, $sql)or die(mysqli_error ($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);

$nb = mysqli_num_rows($req_article);
