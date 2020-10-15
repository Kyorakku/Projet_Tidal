<?php
session_start();

require('./libs/smarty/Smarty.class.php');

try {
    $bdd = new PDO("mysql:host=localhost;dbname=webapp", "root",  "");
    $bdd->query("SET NAMES UTF8");
    foreach($bdd->query('SELECT * from Products') as $row) {
        print_r($row);
    }
    $bdd = null;
} catch (Exception $e) {
    echo "Problème de connexion à la base de donnée !";
    die();
}

echo("Ça marche !!!");


    