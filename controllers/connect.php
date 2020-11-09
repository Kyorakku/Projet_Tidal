<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    session_start();

    require('./libs/smarty/Smarty.class.php');

    try {

        $host = 'localhost';
        $dbname = 'webapp';
        $username = 'root';
        $password = '';

        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $bdd->query('SET NAMES UTF8');

    } catch (PDOException $e) {
        echo 'Problème de connexion à la base de donnée !';
        die();
    }
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $query = $pdo->prepare("SELECT * FROM customers WHERE username = ?");
        $query->execute([$_POST['username']]);
        $user = $query->fetch();

        if($user && password_verify($_POST['password'], $user['password'])) // nom d'utilisateur et mot de passe correctes
        {
           $_SESSION['username'] = $username;
           header('Location: index.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }
    }
    else
    {
       header('Location: login.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: login.php');
}

$bdd = null;
//mysqli_close($db); // fermer la connexion
?>