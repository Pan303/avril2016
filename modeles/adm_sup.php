<?php
var_dump($_SESSION);
if($_SESSION['sup_tous']=="1"){
    $concat="";
}elseif ($_SESSION['sup']=="1"){
    $idutil = $_SESSION['idutil'];
    // et que l'utilisateur fait partie des auteurs de l'article
    $concat = "AND (SELECT COUNT(*) FROM article_has_rubrique ahr WHERE ahr.article_id = $idsup AND ahr.util_id = $idutil) = 1";
}else{
  header("Location: ./");
    exit();
}

$sql = "
DELETE FROM article 
WHERE id=$idsup 
 $concat;
       ";
$req_article = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

if($req_article){
   header("Location: ?updel&del");
}