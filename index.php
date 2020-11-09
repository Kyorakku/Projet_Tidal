


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Projet PHP</title>
    <link href="/css/reset-min.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <?php
        session_start();

        require('./libs/smarty/Smarty.class.php');

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=webapp', 'root',  '');
            $bdd->query('SET NAMES UTF8');
            $rep = $bdd->query('SELECT username from customers');
            while ($donnees = $rep->fetch()) {
                echo  $donnees['username'] . '<br/>';
            }
            $rep->closeCursor();
            $bdd = null;

        } catch (Exception $e) {
            echo 'Problème de connexion à la base de donnée !';
            die();
        }

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

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <?php $smarty->display('libs\smarty\templates\index.tpl'); ?>

  </body>
</html>

</body>
<footer>

</footer>
</html>
