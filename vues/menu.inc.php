<ul>
    <li><a href="./">Accueil admin</a></li>
    <?php
var_dump($_SESSION);

    if($_SESSION['ecrit']) { // vaut 1 (==true)
        ?>
        <li><a href="?new">Nouvel article</a></li>
        <?php
    }
    if($_SESSION['modifie']|| $_SESSION['modifietous'] && $_SESSION['supprime']|| $_SESSION['supprimetous']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Modifier/supprimer</a></li>
        <?php
    }elseif($_SESSION['modifie']|| $_SESSION['modifietous']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Modifier</a></li>
        <?php
    }elseif($_SESSION['supprime']|| $_SESSION['supprime']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Supprime</a></li>
        <?php
    }
    ?>
    <li><a href="?deconnect">Déconnexion</a></li>
</ul>

