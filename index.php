<?php

session_start();

require_once "config.php";

require_once "modeles/db.php";

if (!isset($_SESSION["clef"])|| $_SESSION["clef"]!= session_id()) {
    require_once "controleurs/Site.php";
}else{
    require_once "controleurs/Admin.php";
}