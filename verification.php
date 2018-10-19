<?php
session_start();
if(isset($_POST['username']) && isset($_POST['password']))
{
    // connexion à la base de données
    $db_username = 'root';
    $db_password = 'mysqlPFE';
    $db_name     = 'freeswitchcdr';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');
    
    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    
    if($username !== "" && $password !== "")
    {
        $requete = "SELECT * FROM users WHERE `username`='".$username."' 
        and `mdp`='".$password."'";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete,MYSQLI_NUM);
       // $nbr = mysqli_num_rows($exec_requete); //nbr de ligne
        if($reponse[1]==$username && $reponse[2]==$password && $reponse[7]== 1 ) 
        //nom d'utilisateur et motdepasse correctes
        {
           
           header('Location: principale.php');
        }
        else 
          if($reponse[1]==$username && $reponse[2]==$password && $reponse[7]== 0 && $reponse[8]== "oui" )
            {
           $_SESSION['id'] = $username ;
           header('Location: principaleUser.php');
            }
           else
             {
               header('Location: index.php?erreur=1'); // utilisateur ou mot de passe incorrect
             }
    }
    else
    {
       header('Location: index.php?erreur=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>
