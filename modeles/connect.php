<?php
// si on a envoyé le formulaire

if(!empty($_POST)) {
    $lelogin = htmlspecialchars(strip_tags(trim($_POST['lelogin'])),ENT_QUOTES);
    $lepass = htmlspecialchars(strip_tags(trim($_POST['lepass'])),ENT_QUOTES);

    $sql = "SELECT * FROM utilisateur
       WHERE lelogin = '$lelogin' AND lepass = '$lepass';

       ";
    $req_util = mysqli_query($mysqli, $sql) or die(mysqli_error($mysqli));

    $nb = mysqli_num_rows($req_util);
    // on a un résultat
    if($nb){
        // on tranforme le résultat en tableau associatif
        $util = mysqli_fetch_assoc($req_util);

        // création de session valide
        $_SESSION['mamout'] = session_id();
        $_SESSION['idutil'] = $util['id'];
        $_SESSION['login'] = $util['lelogin'];
        $_SESSION['ecrit'] = $util['ecrit'];
        $_SESSION['modifie'] = $util['modifie'];
        $_SESSION['modifietous'] = $util['modifietous'];
        $_SESSION['supprime'] = $util['supprime'];
        $_SESSION['supprimetous'] = $util['supprimetous'];

        // redirection
        header("Location: ./");
    }else{
        $erreur = "Login et/ou mot de passe incorrecte(s)";
    }

}
