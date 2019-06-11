<?php

    try {
        $bdd = new PDO('mysql:host=localhost;dbname=jeuxvideos;charset=utf8', 'root', '');
    } catch (Exception $e) {
        echo $e->getMessage();
    }

?>