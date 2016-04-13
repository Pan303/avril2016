<?php
// affichage de l'accueil
if (empty($_GET)) {
    require_once "modeles/accueil.php";
    require_once "vues/accueil.php";

// si on veut lire un article en entier
} elseif (isset($_GET['idarticle']) && ctype_digit($_GET['idarticle'])) {
    $idarticle = (int) $_GET['idarticle'];
    require_once "modeles/detail.php";
    require_once "vues/detail.php";

// si on veut se connecter
} elseif (isset($_GET['connect'])){
    require_once "modeles/connect.php";
    require_once "vues/connect.php";
}


