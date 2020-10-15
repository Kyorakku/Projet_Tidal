<?php
session_start();
require('./libs/smarty/Smarty.class.php');
require('./controllers/controller.php');
require('./models/model.php');
try {
$bdd = new PDO("mysql:host=localhost;dbname=webapp",
"debian-sys-maint", "aR7RIRZbiUZw3dYk");
$bdd->query("SET NAMES UTF8");
} catch (Exception $e) {
echo "Problème de connexion à la base de donnée !";
die();
}
page = route($URL);
smarty->display('./views/home.tpl');
?>