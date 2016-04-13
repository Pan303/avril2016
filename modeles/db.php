<?php
/**
 * Created by PhpStorm.
 * User: webform
 * Date: 26/02/2016
 * Time: 09:22
 */

$mysqli = @mysqli_connect(DB_HOST,DB_LOGIN,DB_PWD,DB_NAME);
if(mysqli_connect_error($mysqli)){
    echo htmlentities("Erreur numéro ".mysqli_connect_errno($mysqli),ENT_QUOTES);
    // on arrête le script
    exit();
}
mysqli_set_charset($mysqli,DB_CHARSET);