<?php
    include "database_connexion.php";
    session_start();

    if(!isset($_SESSION["admin_id"])){
        header('Location: login.php');
    }

    include "hvindex.php";
?>  