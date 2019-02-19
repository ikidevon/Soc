<?php 
$host="localhost";
$dbname="SOC";
$name="root";
$mdp="";

try
{
  // On se connecte à MySQL
  $bdd = new PDO('mysql:host='.$host.';dbname='.$dbname.';charset=utf8', $name, $mdp);
}
catch(Exception $e)
{
  // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}

include('inc/menu.php');

if(isset($_POST["login"]))
      {
           if(empty($_POST["pseudo"]) || empty($_POST["mdp"]))
           {
                $message = '<label>All fields are required</label>';
           }
           else
           {
                $query = "SELECT * FROM membres WHERE Pseudo = :pseudo AND mdp = :mdp";
                $statement = $bdd->prepare($query);
                $statement->execute(
                     array(
                          'pseudo'     =>     $_POST["Pseudo"],
                          'mdp'     =>    sha1( $_POST["mdp"] ) 
                     )
                );
                $count = $statement->rowCount();
                if($count > 0)
                {
                     $_SESSION["Pseudo"] = $_POST["Pseudo"];
                     header("location: Membres.php");
                }
                else
                {
                     $message = '<label>Wrong Data</label>';
                }
           }
      }


?>
