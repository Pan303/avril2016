<?php
// si on a envoyé le formulaire

if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);

    $sql = "SELECT util.*,droit.* FROM util
            INNER JOIN droit
            ON util.droit_id = droit.id
            WHERE lelogin = '$lelogin' AND lepass = '$lepass';

       ";
    $req_util = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    $nb = mysqli_num_rows($req_util);
    // on a un résultat
    if($nb){
        // on tranforme le résultat en tableau associatif
        $util = mysqli_fetch_assoc($req_util);

        // création de session valide
        $_SESSION['clef'] = session_id();
        $_SESSION['idutil'] = $util['id'];
        $_SESSION['lelogin'] = $util['lelogin'];
        $_SESSION['ecrit'] = $util['ecrit'];
        $_SESSION['modifie'] = $util['modifie'];
        $_SESSION['modifie_tous'] = $util['modifie_tous'];
        $_SESSION['sup'] = $util['sup'];
        $_SESSION['sup_tous'] = $util['sup_tous'];

        // redirection
        header("Location: ./");
    }else{
        $erreur = "Login et/ou mot de passe incorrecte(s)";
    }

}
