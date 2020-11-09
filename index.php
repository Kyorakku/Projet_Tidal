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
    echo($e);
}

echo("Ça marche !!!");
?>
<?php
require_once('libs/smarty/Smarty.class.php');
define('template_dir', 'libs/smarty/templates/');
define('compile_dir', 'libs/smarty/templates_c/');
define('config_dir', 'libs/smarty/configs/');
define('cache_dir', 'libs/smarty/cache/');
$smarty = new Smarty();
$smarty->assign('name','Ned');
?>

<html>
<header>
<link href="/css/reset-min.css" rel="stylesheet" type="text/css" />
<?php $smarty->display('libs\smarty\templates\indexHeader.tpl'); ?>
</header>

<body>

<?php $smarty->display('libs\smarty\templates\indexBody.tpl'); ?>
Bah faut mettre les articles ici quoi

</body>
<footer>

</footer>
</html>