<html>
<head>
    <meta charset="UTF-8">
    <title>Rubrique</title>
</head>
<body>
<h1>Rubrique</h1>
<?php
include 'vues/menusite.php';
if($nb == 0){
    echo "Pas encore d'articles";
}else {
    foreach ($tab_rubrique AS $tab) {

        $login = explode("|||",$tab['lelogin']);
        $affiche="";
        foreach ($login as $log){

            $affiche .= $log.", ";

        }

        echo "<h2>".$tab['letitre'] . " par ";
        echo substr($affiche, 0, -2)."</h2>";

        echo "<h3>Rubrique : <a href='?idrubrique=".$tab['idrubrique']."'>".$tab['lint']."</a></h3>";

        echo "Le ".$tab['ladate'] . "</br>";
        echo $tab['ladesc'] . " <a href='?idarticle=".$tab['idarticle']."'>... Lire la suite</a><hr/>";


    }

}
?>
</body>
</html>
