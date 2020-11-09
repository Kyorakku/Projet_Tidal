<?php

    $host = 'localhost';
    $dbname = 'webapp';
    $username = 'root';
    $password = '';
    try {

        $bdd = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $bdd->query('SET NAMES UTF8');
        echo "Connecté";

    } catch (PDOException $e) {
        echo 'Problème de connexion à la base de donnée !';
        die();
    }
    
    echo htmlspecialchars($_POST['inputUsername']);

    $query = $bdd->prepare("SELECT * FROM customers WHERE username = ?");
    //$query->execute([$_POST['inputUsername']]);
    //$user = $query->fetch();
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    //$username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    //$password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    //if($username !== "" && $password !== "")
    //{


        if($user && password_verify($_POST['password'], $user['password'])) // nom d'utilisateur et mot de passe correctes
        {
            echo "OUI";
           /*$_SESSION['username'] = $username;
           header('Location: ../index.php');*/
        }
        /*else
        {
           header('Location: ../login.php?erreur=1'); // utilisateur ou mot de passe incorrect
        }*/
      
    //}


else
    {
       //header('Location: ../login.php');
       echo "NON";
    } 
//$bdd = null;
//mysqli_close($db); // fermer la connexion

?>