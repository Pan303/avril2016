<?php
//var_dump($_SESSION);
// si on peut rien faire
if (!($_SESSION['modifie_tous'] || $_SESSION['modifie'] || $_SESSION['sup_tous'] || $_SESSION['sup'])) {
    header("Location: ./");

// si on peut modifier ou supprimer les articles de tout le monde
} elseif ($_SESSION['modifie_tous'] || $_SESSION['sup_tous']) {
    $where = "";
// si on peut modifier ou supprimer ses articles
} else {
    // pour sélectionner que les articles de l'utilisateur
    $idutil = $_SESSION['idutil'];
    $where = "WHERE ahr.util_id = $idutil";
}


$sql = "SELECT a.*, u.lelogin FROM article a INNER JOIN util u ON a.util_id = u.id
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

$tab_article = mysqli_fetch_all($req_article, MYSQLI_ASSOC);


$nb = mysqli_num_rows($req_article);
