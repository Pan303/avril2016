<ul>
    <li><a href="./">Accueil admin</a></li>
    <?php

    if($_SESSION['ecrit']) { // vaut 1 (==true)
        ?>
        <li><a href="?new">Nouvel article</a></li>
        <?php
    }
    if($_SESSION['modifie']|| $_SESSION['modifie_tous'] && $_SESSION['sup']|| $_SESSION['sup_tous']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Modifier/supprimer</a></li>
        <?php
    }elseif($_SESSION['modifie']|| $_SESSION['modifie_tous']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Modifier</a></li>
        <?php
    }elseif($_SESSION['sup']|| $_SESSION['sup']) { // vaut 1 (==true)
        ?>
        <li><a href="?updel">Supprime</a></li>
        <?php
    }
    ?>
    <li><a href="?deconnect">Déconnexion</a></li>
</ul>

