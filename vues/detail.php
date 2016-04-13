<html>

<head>
    <meta charset="UTF-8">
</head>
<body>
<h1>Accueil</h1>
<?php
include 'vues/menusite.php';

if(isset($erreur)){
    echo $erreur;
}else {

        $login = explode("|||",$tab_article['lelogin']);
        $affiche="";
        foreach ($login as $log){

            $affiche .= $log.", ";

        }

        echo "<h2>".$tab_article['letitre'] . " par ";
        echo substr($affiche, 0, -2)."</h2>";
        echo "Le ".$tab_article['ladate'] . "</br>";
        echo $tab_article['ladesc']."<hr>";



}

?>
</body>
</html>
